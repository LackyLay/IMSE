<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Collapsible Tree Example</title>

    <style>

	.node circle {
	  fill: #fff;
	  stroke: steelblue;
	  stroke-width: 3px;
	}

	.node text { font: 7px sans-serif; }

	.link {
	  fill: none;
	  stroke: red;
	  stroke-width: 0.5px;
	}
	
    </style>

  </head>

  <body>

<!-- load the d3.js library -->	
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js"></script>
	
<script>

var width = 400,
    height = 300;

var tree = d3.layout.tree()
    .size([height, width - 160]);

var diagonal = d3.svg.diagonal()
    .projection(function (d) {
        return [d.y, d.x];
    });

var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height)
    .append("g")
    .attr("transform", "translate(40,0)");

var root = getData(),
    nodes = tree.nodes(root),
    links = tree.links(nodes);

var link = svg.selectAll(".link")
    .data(links)
    .enter()
    .append("g")
    .attr("class", "link");

link.append("path")
    .attr("fill", "none")
    .attr("stroke", "#ff8888")
    .attr("stroke-width", "1.5px")
    .attr("d", diagonal);

link.append("text")
    .attr("font-family", "Arial, Helvetica, sans-serif")
    .attr("fill", "Black")
    .style("font", "normal 12px Arial")
    .attr("transform", function(d) {
        return "translate(" +
            ((d.source.y + d.target.y)/2) + "," + 
            ((d.source.x + d.target.x)/2) + ")";
    })   
    .attr("dy", ".35em")
    .attr("text-anchor", "middle")
    .text(function(d) {
        console.log(d.target.rule);
         return d.target.rule;
    });

var node = svg.selectAll(".node")
    .data(nodes)
    .enter()
    .append("g")
    .attr("class", "node")
    .attr("transform", function (d) {
        return "translate(" + d.y + "," + d.x + ")";
    });

node.append("circle")
    .attr("r", 4.5);

node.append("text")
    .attr("dx", function (d) {
        return d.children ? -8 : 8;
    })
    .attr("dy", 3)
    .style("text-anchor", function (d) {
        return d.children ? "end" : "start";
    })
    .text(function (d) {
        return d.name;
    });

function getData() {
    return {
        "name": "Id:1",
        "rule": "successful",
            "children": [{
            "name": "Id:2",
            "rule": "successful",
                "children": [{
                "name": "Id:3",
                "rule": "successful",
                    "children": [{
                    "name": "Id:4",
                    "rule": "error"}]
            }]
        }]
    };
};
</script>
	
  </body>
</html>