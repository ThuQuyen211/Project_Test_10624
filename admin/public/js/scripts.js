function toggleSidebar() {
    let sidebar = document.querySelector('.sidebar');
    let mainContent = document.querySelector('.main-content');
    
    if (sidebar.style.width === '250px' || sidebar.style.width === '') {
        sidebar.style.width = '100px';
        mainContent.style.marginLeft = '100px';
    } else {
        sidebar.style.width = '250px';
        mainContent.style.marginLeft = '250px';
    }
}

function openAddForm() {
    document.getElementById("form-add-edit").style.display = "block";
    document.getElementById("form-title").innerText = "Thêm nhà xuất bản";
}

function closeForm() {
    document.getElementById("form-add-edit").style.display = "none";
}
