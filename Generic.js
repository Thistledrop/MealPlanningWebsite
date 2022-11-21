function alertTest(string) {
	alert(string);
}
//Popup Modals on button
//To Use:
//assign this function to button 'onclick'
//pass ID of modal to assign
//modal must contain 'x' of class "close"
//txt, save button, and warning must have class labels
//modal will close on outside click
function openModal(modalID) {
	var modal = document.getElementById(modalID);
	modal.style.display = "block";
	var Txt = modal.getElementsByClassName("textbox")[0];
	var Btn = modal.getElementsByClassName("button")[0];
	var Warn = modal.getElementsByClassName("warning")[0];
	var span = modal.getElementsByClassName("close")[0];
	  
	span.onclick = function() {
		modal.style.display = "none";
		if(Txt != null)
			Txt.value = '';
		if(Warn != null)
			Warn.style.display = "none";
	}
	
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	
	if(Btn != null) {
		Btn.onclick = function() {
			if(!Txt.value.length == 0)
				{
					//save and close
					modal.style.display = "none";
				}
			else
				{
					Warn.style.display = "block";
				}
		}
	}
}

//Color retrieval and setting
var r = document.querySelector(':root');

function getColor(varName) {
	var rs = getComputedStyle(r);
	//alert("The value of " +varName+ " is " + rs.getPropertyValue('--'+varName));
	return rs.getPropertyValue('--'+varName);
}

function setColor(varName, newColor) {
	r.style.setProperty('--'+varName, newColor);
}

//Highlighting and Selecting
//To Use:
//Grids must be named 'highlightingGrid', lists must be named 'highlightingList'
//returns must be named 'gridReturn' or 'listReturn'
//gets called on every page
makeTableHighlightable();
function makeTableHighlightable() {
	var table = document.getElementById('highlightingGrid');
	if(table != null) {
		var cells = table.getElementsByTagName('td');
		var selectedCell = null;

		for (var i = 0; i < cells.length; i++) {
			var cell = cells[i];
			
			cell.onclick = function () {
				if (selectedCell != null)
					{selectedCell.style.backgroundColor = getColor('Background');}
				selectedCell = this;
				this.style.backgroundColor = getColor('Highlight');
				document.getElementById("gridReturn").value = this.innerText;
			}

			cell.onmouseover = function () {
				this.style.backgroundColor = getColor('Highlight');
			}
			cell.onmouseout = function () {
				if (this != selectedCell)
				{this.style.backgroundColor = getColor('Background');}
			}
		}
	}
}
makeListHighlightable();
function makeListHighlightable() {
	var list = document.getElementById('highlightingList');
	if(list != null) {
		var items = list.getElementsByTagName('li');
		var selectedItem = null;
		
		for(var i = 0; i < items.length; i++) {
			var item = items[i];
			
			item.onclick = function () {
				if (selectedItem != null)
					{selectedItem.style.backgroundColor = getColor('Background');}
				selectedItem = this;
				this.style.backgroundColor = getColor('Highlight');
				document.getElementById("listReturn").value = this.innerText;
			}
			
			item.onmouseover = function() {
				this.style.backgroundColor = getColor('Highlight');
			}
			
			item.onmouseout = function() {
				if(this != selectedItem)
				{this.style.backgroundColor = getColor('Background');}
			}
		}
	}
}