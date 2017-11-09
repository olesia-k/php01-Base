function delete_position(puth, text) {
	// console.log(puth);
	// console.log(text);

	if (confirm(text)) {
		location.href = puth;
	}
	return false;
}