var handleDelete = (id, controller, action) => {
    var c = confirm('Do you want to delete it??');
    if (c) {
        window.location.href = `/Admin/${controller}/${action}/${id}`;
    }
}

