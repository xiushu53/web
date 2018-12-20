!(function(d3) {

    var dim = { width: 750, height: 495 };
    var margin = { top: 6, bottom: 64, left: 32, right: 0 };
    var inputHeight = 32;
    var timeKey = '大会';
    dim.graphWidth = dim.width - margin.left - margin.right;
    dim.graphHeight = dim.height - margin.top - margin.bottom;

    var prev, next, trans;

    d3.select('body').on('keydown', function() {
        if (d3.event.which === 39) {
            next();
        }
        if (d3.event.which === 37) {
            prev();
        }
    });

    var time = 0;

    var optimizeArrange = function(m, x, y) {
        // [radius, NCol, Nrow]
        if (x * m <= y) {
            return [x / 2, 1, m];
        }
        if (x / m > y) {
            return [y / 2, m, 1];
        }
        var rng = [1, m];
        while (rng[1] - rng[0] > 1) {
            var mid = Math.floor((rng[1] + rng[0]) / 2);
            var d = x / mid;
            if (Math.ceil(m / mid) * d < y) {
                rng[1] = mid;
            } else {
                rng[0] = mid;
            }
        }
        return [x / rng[1] * 0.5, rng[1], Math.ceil(m / rng[1]) + 1];
    };

    var dotBarChart = function(rootSelection) {
        function update(dataOrigin) {
            var data = dataOrigin[0];
            rootSelection.selectAll('*').remove();

            var axisLayer = rootSelection.append('g')
                .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')');
            var graphLayer = rootSelection.append('g')
                .attr('transform', 'translate(' + margin.left + ',' + margin.top + ')');
            var inputLayer = rootSelection.append('g')
                .attr('transform', 'translate(0,' + (dim.height - inputHeight) + ')');

            var labels = d3.keys(data[0]).filter(function(d) { return d !== timeKey; });
            var times = data.map(function(d) { return d[timeKey]; });
            var inputScale = d3.scaleBand()
                .rangeRound([0, dim.width], 4 / 198, 0).domain(d3.range(times.length)).padding(.02);
            var inputContainerLayer = inputLayer.append('g');
            var inputCursorLayer = inputLayer.append('g');
            var inputLabelLayer = inputLayer.append('g');
            var cursor = inputCursorLayer.append('rect')
                .attr('width', inputScale.bandwidth())
                .attr('height', inputHeight)
                .attr('x', 5).attr('y', 0)
                .style('fill', '#303133');
            inputContainerLayer.selectAll('rect').data(times).enter().append('rect')
                .attr('width', inputScale.bandwidth())
                .attr('height', inputHeight)
                .attr('x', function(d, i) { return inputScale(i); }).attr('y', 0)
                .style('fill', '#D8D8D8')
            var timeButtonContainer = inputLabelLayer.selectAll('g')
                .data(times).enter().append('g')
                .attr('transform', function(d, i) {
                    return 'translate(' + inputScale(i) + ',0)';
                }).on('click', function(d, i) {
                    trans(i);
                });
            timeButtonContainer.append('rect')
                .attr('width', inputScale.bandwidth())
                .attr('height', inputHeight)
                .attr('x', 0).attr('y', 0)
                .style('fill', 'rgba(0, 0, 0, 0)')
                .style('stroke', 'none')
                .style('cursor', 'pointer');
            var buttonLabels = timeButtonContainer.append('text')
                .attr('x', inputScale.bandwidth() * 0.5)
                .attr('y', inputHeight * 0.5)
                .attr('text-anchor', 'middle')
                .attr('dominant-baseline', 'middle')
                .style('fill', function(d, i) {
                    return (i == time) ? '#FFF' : '#FFF';
                }).style('font-size', 18)
                .style('cursor', 'pointer')
                .text(function(d) { return d; });
            var counts = data.map(function(v) {
                var obj = {};
                labels.forEach(function(label, i) {
                    obj[label] = +v[label];
                });
                return obj;
            });
            var maxBar = d3.max(counts.map(function(tmp) {
                return d3.max(d3.values(tmp));
            }));
            var denominator = Math.ceil(maxBar / 500);
            if (denominator > 1) {
                counts = counts.map(function(v) {
                    var obj = {};
                    labels.forEach(function(label) {
                        obj[label] = Math.ceil(v[label] / denominator);
                    });
                    return obj;
                });
                maxBar = Math.ceil(maxBar / denominator);
            }

            var colorScale = d3.scaleOrdinal().range([
                '#FFF6BB', '#FFCE83', '#FC996B', '#F16A69', '#D05382', '#834C86', '#573874'
            ]).domain(labels);
            var xScale = d3.scaleBand()
                .rangeRound([0, dim.graphWidth], 0.3)
                .domain(labels)
                .padding(.3); // bar-chart-part padding()
            var params = optimizeArrange(maxBar, xScale.bandwidth(), dim.graphHeight);
            var radius = params[0];
            var nCol = params[1];
            var nRow = params[2];
            var yScale = d3.scalePoint()
                .range([dim.graphHeight, dim.graphHeight - nRow * radius * 2], 0)
                .domain(d3.range(nRow));
            var xLocalScale = d3.scaleBand()
                .rangeRound([0, xScale.bandwidth()])
                .domain(d3.range(nCol));

            var xAxis = d3.axisBottom(xScale);
            var yAxis = d3.axisLeft(yScale)
                .tickValues(d3.range(nRow).filter(function(d) { return d % Math.ceil(nRow / (dim.graphHeight / 14)) === 0; }))
                .tickFormat(function(d) { return denominator * (d * nCol); });

            axisLayer.append('g')
                .attr('transform', 'translate(' + 0 + ',' + dim.graphHeight + ')')
                .attr('class', 'axis')
                .call(xAxis);
            axisLayer.append('g')
                .attr('transform', 'translate(' + 0 + ',' + 0 + ')')
                .attr('class', 'axis')
                .call(yAxis);

            axisLayer.selectAll('.axis text')
                .style('font-size', 14);
            axisLayer.selectAll('.axis path.domain')
                .style('fill', 'none')
                .style('stroke', '#000')
                .style('shape-rendering', 'crispEdges');
            axisLayer.selectAll('.axis line')
                .style('fill', 'none')
                .style('stroke', '#000')
                .style('shape-rendering', 'crispEdges');

            if (denominator > 1) {
                var legend = axisLayer.append('g')
                    .attr('class', 'legend')
                    .attr('transform', 'translate(-20,-10)');
                legend.append('circle')
                    .attr({ r: radius, fill: '#888', stroke: 'none' });
                legend.append('text')
                    .attr({ x: 5, y: 4, 'font-size': 12, 'font-family': '"Lucida Grande", Helvetica, Arial, sans-serif' })
                    .text('=' + denominator);
            }
            var labelMax = {};
            labels.forEach(function(label) {
                labelMax[label] = d3.max(counts, function(d) { return d[label]; });
            });

            var displayData = labels.map(function(label) {
                return {
                    label: label,
                    mat: d3.range(labelMax[label]).map(function(d) {
                        return d3.range(times.length).map(function(t) {
                            return [d, d < counts[t][label]];
                        });
                    })
                };
            });

            var dotContainers = graphLayer.selectAll('g')
                .data(displayData).enter().append('g')
                .attr('transform', function(d) { return 'translate(' + xScale(d.label) + ',0)'; })
                .style('fill', function(d) { return colorScale(d.label); });
            var dots = dotContainers.selectAll('circle')
                .data(function(d) { return d.mat; })
                .enter().append('circle')
                .attr('r', function(d) { return d[time][1] ? radius : 0; })
                .attr('cx', function(d) { return xLocalScale(d[time][0] % nCol) + radius; })
                .attr('cy', function(d) {
                    return d[time][1] ?
                        (yScale(Math.floor(d[time][0] / nCol)) + yScale.bandwidth() - radius) :
                        (yScale(Math.floor(d[time][0] / nCol)) + yScale.bandwidth() - radius - 16 * radius);
                });

            var delayMax = 500;
            var duration = 1000;
            trans = function(t) {
                var pastTime = time;
                time = t;
                dots.filter(function(d) { return d[time][1] && !d[pastTime][1]; }).transition()
                    .delay(function() { return Math.random() * delayMax; })
                    .duration(duration)
                    .attr('r', radius)
                    .attr('cy', function(d) {
                        return (yScale(Math.floor(d[time][0] / nCol)) + yScale.bandwidth() - radius);
                    });
                dots.filter(function(d) { return !d[time][1] && d[pastTime][1]; }).transition()
                    .delay(function() { return Math.random() * delayMax; })
                    .duration(duration)
                    .attr('r', 0)
                    .attr('cy', function(d) {
                        return (yScale(Math.floor(d[time][0] / nCol)) + yScale.bandwidth() - radius - 16 * radius);
                    });

                cursor.transition()
                    .duration(duration + delayMax)
                    .attr('x', inputScale(time));
                buttonLabels.transition()
                    .duration(duration + delayMax)
                    .style('fill', function(d, i) { return (i === time) ? '#FFF' : '#FFF'; });
            };

            prev = function() {
                if (time - 1 < 0) { return; }
                trans((times.length + time - 1) % times.length);
            };
            next = function() {
                if ((time + 1) == times.length) { return; }
                trans((time + 1) % times.length);
            };
        }
        update(rootSelection.data());
    }
    d3.dotBarChart = dotBarChart;
}(d3));
