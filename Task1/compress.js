function compress() {
	var input = document.getElementById("textarea").value;
	
	var frequency= getFrequency(input);
	var codes = getCodes(frequency);
	var output = compressHuffman(input, codes);
	
	
	temp = "";
	for (var elem in codes) {
	  temp += elem + " = " + codes[elem] + "<br/>";
	}
	document.getElementById("codes").innerHTML = temp;
	document.getElementById("output").innerHTML = "Compressed Form<br />"+output;
	document.getElementById("output").style.visibility="visible";
document.getElementById("codes").style.visibility="hidden";
	document.getElementById("c").style.visibility="visible";
	
}

function sortNumberAsc(a, b) {
	return a[1] - b[1];
}

function getCodes(freq) {
	var tree = new Array();
	var secondTree = new Array();
	
	this.getNext = function() {
	if (tree.length > 0 && secondTree.length > 0 
               && tree[0].freq < secondTree[0].freq)
	  return tree.shift();
	
	if (tree.length > 0 && secondTree.length > 0 
                && tree[0].freq > secondTree[0].freq)
	  return secondTree.shift();
	
	if (tree.length > 0)
	  return tree.shift();
	
	return secondTree.shift();
	}
	var sortedFreq = new Array();
	var codes = new Array();
	
	var x = 0;
	for (var elem in freq) {
	  sortedFreq[x] = new Array(elem, freq[elem]);
	  x = x + 1;
	}
	
	sortedFreq = sortedFreq.sort(sortNumberAsc);
	x = 0;
	
	for (var elem in sortedFreq) {
	  tree[x] = new node();
	  tree[x].freq = sortedFreq[elem][1];
	  tree[x].value = sortedFreq[elem][0];
	  x = x + 1;
	}
	while (tree.length + secondTree.length > 1) {
		var left = getNext();
		var right = getNext();
		var newnode = new node();
		newnode.left = left;
		newnode.right = right;
		newnode.freq = left.freq + right.freq;
		newnode.left.parent = newnode;
		newnode.right.parent = newnode;
		secondTree.push(newnode);
	}

	var currentnode = secondTree[0];
	var code = "";
	while (currentnode) {
		if (currentnode.value) {
			codes[currentnode.value] = code;
			code = code.substr(0, code.length - 1);
			currentnode.visited = true;
			currentnode = currentnode.parent;
		}
		else if (!currentnode.left.visited) {
			currentnode = currentnode.left;
			code += "0";
		}
		else if (!currentnode.right.visited) {
			currentnode = currentnode.right;
			code += "1";
		}
		else {
			currentnode.visited = true;
			currentnode = currentnode.parent;
			code = code.substr(0, code.length - 1);
		}
	}
	return codes;
}

function node() {
  this.left = null;
  this.right = null;
  this.freq = null;
  this.value = null;
  this.code = "";
  this.parent = null;
  this.visited = false;
}

function compressHuffman(input, codes) {
  var output = input.split("");
  for (var elem in output) {
	  output[elem] = codes[output[elem]];
  }
  return output.join("");
}

function getFrequency(input) {
  var freq = new Array();
  var x = 0;
  var len = input.length;
  while (x < len) {
	  var chr = input.charAt(x);
	  if (freq[chr]) {
		  freq[chr] = freq[chr] + 1;
	  }
	  else {
		  freq[chr] = 1;
	  }
	  x++;
  }

  for (var elem in freq) {
	  freq[elem] = freq[elem] / len;
  }
  return freq;
}