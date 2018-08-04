!(function(d3) {
    var constant = function(d) {
        return function constant() {
            return d;
        }
    };

    var latLng2Coord = function(lat, lng) {
        var x = Math.cos(Math.PI * lng / 180);
        var y = Math.sin(Math.PI * lat / 180);
        var z = Math.sin(Math.PI * lng / 180);
        var dim = Math.sqrt(x * x + y * y + z * z);
        return [x / dim, y / dim, z / dim];
    };

    var ip = function(u, v) {
        return u[0] * v[0] + u[1] * v[1] + u[2] * v[2];
    }

    var globeHandler = function() {
        var _geometry = function() { throw 'set geometry.' };
        var _points = function(_) { return _.data(); };
        var _pointLatitudeAttribute = constant('latitude');
        var _pointLongitudeAttribute = constant('longitude');
        var _projection = constant(d3.geoOrthographic());
        var _shadowProjection = constant(d3.geoOrthographic());
        var _scale = constant(120);
        var _shadowScale = constant(120);
        var _angle = constant(-30);
        var _shadowAngle = constant(90);
        var _translation = constant([0, 0]);
        var _shadowTranslation = constant([0, 0]);
        var _shadowDeviation = constant(12);
        var _width = constant(500);
        var _height = constant(500);
        var _pointRadius = constant(4);
        var _graticuleGeometry = constant(d3.geoGraticule()());
        var _sphereGeometry = constant({ type: 'Sphere' });

        function _globeHandler(_) {
            var defs = _.select('defs');
            if (defs.size() === 0) { defs = _.append('defs'); }

            var angle = _angle.apply(this, arguments);
            var shadowAngle = _shadowAngle.apply(this, arguments);
            var scale = _scale.apply(this, arguments);
            var shadowScale = _shadowScale.apply(this, arguments);
            var translation = _translation.apply(this, arguments);
            var shadowTranslation = _shadowTranslation.apply(this, arguments);
            var geom = _geometry.apply(this, arguments);
            var points = _points.apply(this, arguments);
            var latitudeAttr = _pointLatitudeAttribute.apply(this, arguments);
            var longitudeAttr = _pointLongitudeAttribute.apply(this, arguments);
            var projection = _projection.apply(this, arguments)
                .translate(translation).scale(scale).rotate([0, angle]);
            var shadowProjection = _shadowProjection.apply(this, arguments)
                .translate(shadowTranslation).scale(shadowScale).rotate([0, shadowAngle]);
            var path = d3.geoPath().projection(projection);
            var shadowPath = d3.geoPath().projection(shadowProjection);
            var graticuleGeom = _graticuleGeometry.apply(this, arguments);
            var sphereGeom = _sphereGeometry.apply(this, arguments);
            var shadowDeviation = _shadowDeviation.apply(this, arguments);
            var height = _height.apply(this, arguments);
            var width = _width.apply(this, arguments);
            var pointRadius = _pointRadius.apply(this, arguments);

            var viewVector = latLng2Coord(-projection.rotate()[1], -projection.rotate()[0]);

            var isVisibleFront = function(d) {
                return (ip(d.v, viewVector) >= 0) ? 'visible' : 'hidden';
            };
            var isVisibleBack = function(d) {
                return (ip(d.v, viewVector) < 0) ? 'visible' : 'hidden';
            };
            var pointPreproc = function(d) {
                d.lng = +d[longitudeAttr];
                d.lat = +d[latitudeAttr];
                d.coordinate = function() { return projection([d.lng, d.lat]); };
                d.v = latLng2Coord(d.lat, d.lng);
                d.xy = d.coordinate();
            };

            points.forEach(pointPreproc);

            var filter = defs.select('filter');
            if (filter.size() === 0) {
                filter = defs.append('filter')
                    .attr('id', 'shadowFilter')
                    .attr('filterUnits', 'userSpaceOnUse')
                    .attr('x', -0.5 * width)
                    .attr('y', -0.5 * height)
                    .attr('width', width).attr('height', height);
            }
            var blur = filter.select('feGaussianBlur');
            if (blur.size() === 0) {
                blur = filter.append('feGaussianBlur')
                    .attr('in', 'SourceGraphic')
                    .attr('stdDeviation', shadowDeviation);
            }
            var shadowLayer = _.select('g.shadow');
            if (shadowLayer.size() === 0) {
                shadowLayer = _.append('g')
                    .attr('class', 'shadow')
            }
            shadowLayer.datum(geom)
                .attr('stroke', 'none')
                .attr(
                    'transform',
                    'translate(0, ' + scale + ') ' +
                    'scale(1.0, ' + (Math.sin(angle * Math.PI / 180)) + ')'
                ).attr('filter', 'url(#shadowFilter)');
            shadowProjection.clipAngle(180);
            var shadowBack = shadowLayer.select('path.shadow.back');
            if (shadowBack.size() === 0) {
                shadowBack = shadowLayer.append('path')
                    .attr('class', 'shadow back');
            }
            shadowBack.attr('d', shadowPath);
            shadowProjection.clipAngle(90);
            var shadowFront = shadowLayer.select('path.shadow.front');
            if (shadowFront.size() === 0) {
                shadowFront = shadowLayer.append('path')
                    .attr('class', 'shadow front')
            }
            shadowFront.attr('d', shadowPath);

            var earthLayer = _.select('g.earth');
            if (earthLayer.size() === 0) {
                earthLayer = _.append('g')
                    .attr('class', 'earth');
            }
            projection.clipAngle(180);

            var pointBackLayer = earthLayer.select('g.point.back');
            if (pointBackLayer.size() === 0) {
                pointBackLayer = earthLayer.append('g')
                    .attr('class', 'point back');
            }
            var pointsBack = pointBackLayer.selectAll('circle.point.back')
                .data(points);
            pointsBack.exit().remove();
            pointsBack = pointsBack.enter().append('circle')
                .attr('class', 'point back')
                .merge(pointsBack)
                .attr('cx', function(d) { return d.xy[0]; })
                .attr('cy', function(d) { return d.xy[1]; })
                .attr('r', pointRadius);

            var landBack = earthLayer.select('path.land.back');
            if (landBack.size() === 0) {
                landBack = earthLayer.append('path')
                    .attr('class', 'land back');
            }
            landBack.datum(geom)
                .attr('d', path);

            projection.clipAngle(90);

            var sphere = earthLayer.select('path.sphere');
            if (sphere.size() === 0) {
                sphere = earthLayer.append('path')
                    .attr('class', 'sphere');
            }
            sphere.datum(sphereGeom)
                .attr('d', path);

            var graticule = earthLayer.select('path.graticule');
            if (graticule.size() === 0) {
                graticule = earthLayer.append('path')
                    .attr('class', 'graticule');
            }
            graticule.datum(graticuleGeom)
                .attr('d', path);

            var landFront = earthLayer.select('path.land.front');
            if (landFront.size() === 0) {
                landFront = earthLayer.append('path')
                    .attr('class', 'land front');
            }
            landFront.datum(geom)
                .attr('d', path);

            var pointFrontLayer = earthLayer.select('g.point.front');
            if (pointFrontLayer.size() === 0) {
                pointFrontLayer = earthLayer.append('g')
                    .attr('class', 'point front');
            }
            var pointsFront = pointFrontLayer.selectAll('circle.point.front')
                .data(points);
            pointsFront.exit().remove();
            pointsFront = pointsFront.enter().append('circle')
                .attr('class', 'point front')
                .merge(pointsFront)
                .attr('cx', function(d) { return d.xy[0]; })
                .attr('cy', function(d) { return d.xy[1]; })
                .attr('r', pointRadius);

            _rotationImpl = function(r) {
                shadowProjection.rotate([r, shadowAngle])
                    .clipAngle(180);
                shadowBack.attr('d', shadowPath);
                shadowProjection.clipAngle(90);
                shadowFront.attr('d', shadowPath);
                projection.rotate([r, angle])
                    .clipAngle(180);

                viewVector = latLng2Coord(-projection.rotate()[1], -projection.rotate()[0]);

                points.forEach(function(d) {
                    d.xy = d.coordinate();
                });
                pointsBack.attr('cx', function(d) { return d.xy[0]; })
                    .attr('cy', function(d) { return d.xy[1]; })
                    .attr('visibility', isVisibleBack);
                landBack.attr('d', path);
                projection.clipAngle(90);
                sphere.attr('d', path);
                graticule.attr('d', path);
                landFront.attr('d', path);
                pointsFront.attr('cx', function(d) { return d.xy[0]; })
                    .attr('cy', function(d) { return d.xy[1]; })
                    .attr('visibility', isVisibleFront);
            };
        };
        _globeHandler.geometry = function(_) {
            return arguments.length ? (_geometry = typeof _ === 'function' ? _ : constant(_), _globeHandler) : _geometry;
        };
        _globeHandler.points = function(_) {
            return arguments.length ? (_points = typeof _ === 'function' ? _ : constant(_), _globeHandler) : _points;
        }
        _globeHandler.translation = function(_) {
            return arguments.length ? (_translation = typeof _ === 'function' ? _ : constant(_), _globeHandler) : _translation;
        };
        _globeHandler.shadowTranslation = function(_) {
            return arguments.length ? (_shadownTranslation = typeof _ === 'function' ? _ : constant(_), _globeHandler) : _shadowTranslation;
        };
        _globeHandler.height = function(_) {
            return arguments.length ? (_height = typeof _ === 'function' ? _ : constant(+_), _globeHandler) : _height;
        };
        _globeHandler.width = function(_) {
            return arguments.length ? (_width = typeof _ === 'function' ? _ : constant(+_), _globeHandler) : _width;
        };
        _globeHandler.rotate = function(_) {
            _rotationImpl(_);
        };
        _globeHandler.pointLatitudeAttribute = function(_) {
            return arguments.length ? (_pointLatitudeAttribute = typeof _ === 'function' ? _ : constant('' + _), _globeHandler) : _pointLatitudeAttribute;
        };
        _globeHandler.pointLongitudeAttribute = function(_) {
            return arguments.length ? (_pointLongitudeAttribute = typeof _ === 'function' ? _ : constant('' + _), _globeHandler) : _pointLongitudeAttribute;
        };
        _globeHandler.projection = function(_) {
            return arguments.length ? (_projection = typeof _ === 'function' ? _ : constant(_), _globeHandler) : _projection;
        };
        _globeHandler.shadowProjection = function(_) {
            return arguments.length ? (_shadowProjection = typeof _ === 'function' ? _ : constant(_), _globeHandler) : _shadowProjection;
        };
        _globeHandler.scale = function(_) {
            return arguments.length ? (_scale = typeof _ === 'function' ? _ : constant(+_), _globeHandler) : _scale;
        };
        _globeHandler.shadownScale = function(_) {
            return arguments.length ? (_shadownScale = typeof _ === 'function' ? _ : constant(+_), _globeHandler) : _shadownScale;
        };
        _globeHandler.angle = function(_) {
            return arguments.length ? (_angle = typeof _ === 'function' ? _ : constant(+_), _globeHandler) : _angle;
        };
        _globeHandler.shadowAngle = function(_) {
            return arguments.length ? (_shadowAngle = typeof _ === 'function' ? _ : constant(+_), _globeHandler) : _shadowAngle;
        };
        _globeHandler.shadowDeviation = function(_) {
            return arguments.length ? (_shadowDeviation = typeof _ === 'function' ? _ : constant(+_), _globeHandler) : _shadowDeviation;
        };
        _globeHandler.pointRadius = function(_) {
            return arguments.length ? (_pointRadius = typeof _ === 'function' ? _ : constant(+_), _globeHandler) : _pointRadius;
        };
        _globeHandler.graticuleGeometry = function(_) {
            return arguments.length ? (_graticuleGeometry = typeof _ === 'function' ? _ : constant(_), _globeHandler) : _graticuleGeometry;
        };
        _globeHandler.sphereGeometry = function(_) {
            return arguments.length ? (_sphereGeometry = typeof _ === 'function' ? _ : constant(_), _globeHandler) : _sphereGeometry;
        };
        return _globeHandler;
    };
    d3.globeHandler = globeHandler;
}(d3));