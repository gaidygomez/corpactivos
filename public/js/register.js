const chek = document.getElementById('check');
const btn = document.querySelector('button');

check.addEventListener('change', () => {
	if (check.checked) {
		btn.disabled = false;
	} else {
		btn.disabled = true;
	}
})