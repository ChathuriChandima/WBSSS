function addRow(tableID) {

			var table = document.getElementById(tableID);

			var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

            var cell1 = row.insertCell(0);

			var cell2 = row.insertCell(1);
			cell2.innerHTML = rowCount + 1;

			var cell3 = row.insertCell(2);
			var element2 = document.createElement("input");
			element2.type = "text";
            element2.name = "txtbox[]";
            cell3.appendChild(element2);
            var element3 = document.createElement("input");
			element3.type = "text";
            element3.name = "txtbox[]";
			cell4.appendChild(element3);


		}