// //Alicuotas
// //Llama modal nuevo
// function nuevaAlicuota(){
//     $('#nuevaAlicuota').modal('toggle');
// }

// //Llama modal para editar
// function editAlicuota(index) {
//     //Modal edit
//     $('#editAlicuota').modal('toggle');

//     //Nodos tabla
//     var id_alicuota = index.parentNode.parentNode.cells[0].textContent;
//     var new_alicuota = index.parentNode.parentNode.cells[1].textContent;
//     var new_fecha = index.parentNode.parentNode.cells[2].textContent;

//     //Pego en el formulario
//     document.getElementById('id_alicuota').value = id_alicuota;
//     document.getElementById('new_alicuota').value = new_alicuota;
//     document.getElementById('new_fecha_alicuota').value = new_fecha;
// }

// //Elimina el registro
// function delAlicuota(index) {
//     var tabla = document.getElementById('tablaAlicuota');
//     var tr = index.parentNode.parentNode.rowIndex;
//     //Nodos tabla
//     var id = index.parentNode.parentNode.cells[0].textContent;

//     alert(`Seguro eliminar al id ${id}`);
//     tabla.deleteRow(tr);
// }

// //UT
// //Llama modal nuevo
// function nuevaUt(){
//     $('#nuevaUt').modal('toggle');
// }

// //Llama modal para editar
// function editUt(index) {
//     //Modal edit
//     $('#editUt').modal('toggle');

//     //Nodos tabla
//     var id_ut = index.parentNode.parentNode.cells[0].textContent;
//     var new_ut = index.parentNode.parentNode.cells[1].textContent;
//     var new_fecha = index.parentNode.parentNode.cells[2].textContent;

//     //Pego en el formulario
//     document.getElementById('id_ut').value = id_ut;
//     document.getElementById('new_ut').value = new_ut;
//     document.getElementById('new_fecha_ut').value = new_fecha;
// }

// //Elimina el registro
// function delUt(index) {
//     var tabla = document.getElementById('tablaUt');
//     var tr = index.parentNode.parentNode.rowIndex;
//     //Nodos tabla
//     var id = index.parentNode.parentNode.cells[0].textContent;

//     alert(`Seguro eliminar al id ${id}`);
//     tabla.deleteRow(tr);
// }