
//FUNCION PARA MOSTRAR TABLAS COMPLETAS U OCULTAR
document.getElementById('toggleTable').addEventListener('click', function() {
    var table = document.getElementById('appointmentTable');
    table.classList.toggle('hidden');
});



//FUNCION PARA SIDEBAR DE MENU
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
}



