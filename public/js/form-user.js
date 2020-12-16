const profileForm = document.getElementById('profile-data');
const responseForm = document.getElementById('response');
const passUserForm = document.getElementById('password-user');
const responsePassword = document.getElementById('response-password');
const dataLoginForm = document.getElementById('data-login');
const responseDataLogin = document.getElementById('response-data-login');

profileForm.addEventListener('submit', updateProfile);
passUserForm.addEventListener('submit', updatePassword);
dataLoginForm.addEventListener('submit', updateLogin);

/** 
 *  Actualizar Datos Personales de Usuario
 */

function updateProfile(event) {
	event.preventDefault();
	
	let data = new FormData(profileForm);

	fetch("profile", {
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		method: 'post',
		body: data
	})
	.then( res => res.json() )
	.then( res => responseProfile(res) )
	.catch( err => console.error(err) )
}

function responseProfile(params) {
	if (params.success) {
		responseForm.innerHTML = `
			<div class="alert alert-success text-center" role="alert">
				${params.success}
			</div>
			`;

		setTimeout(() => {
			responseForm.innerHTML = '';
		}, 3500);
	} else if (params.error) {

		let html = `<div class="alert alert-danger role="alert">`;
               html += `<ul class="lista">`;
               params.error.forEach(err => {
                    html += `
                         <li>${err}</li>
                    `;
               })
			   html += `</ul>
			   	</div>`;
		
		responseForm.innerHTML = html;

		setTimeout(() => {
			responseForm.innerHTML = '';
		}, 4500);
	}
}

/**
 * Actualizar Contraseña
 */

function updatePassword(event) {
	event.preventDefault();

	let passwords = new FormData(passUserForm);

	fetch('update-password', {
		headers: {
			'X-CSFR-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		method: 'post',
		body: passwords
	})
	.then( res => res.json() )
	.then( (result) => resUpdatePassword(result) )
	.catch( (err) => console.error(err))
}

function resUpdatePassword(params) {
	if (params.success) {
		responsePassword.innerHTML = `
			<div class="alert alert-success text-center" role="alert">
				${params.success}
			</div>
			`;
		
		passUserForm.reset();

		setTimeout(() => {
			responsePassword.innerHTML = '';
		}, 3500);
	} else if (params.errors) {

		let html = `<div class="alert alert-danger role="alert">`;
               html += `<ul class="lista">`;
               params.errors.forEach(err => {
                    html += `
                         <li>${err}</li>
                    `;
               })
			   html += `</ul>
			   	</div>`;

		responsePassword.innerHTML = html;

		setTimeout(() => {
			responsePassword.innerHTML = '';
		}, 4500);
	}
}

/**
 * Actualizar Datos del Login
 */

function updateLogin(event) {
	event.preventDefault();

	let login = new FormData(dataLoginForm);

	fetch('update-login', {
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		method: 'post',
		body: login
	})
	.then( res => res.json() )
	.then( (result) => resUpdateLogin(result) )
	.catch( (err) => console.error(err) )
}

function resUpdateLogin(params) {
	if (params.success) {
		responseDataLogin.innerHTML = `
			<div class="alert alert-success text-center" role="alert">
				${params.success}
			</div>
			`;
		
		passUserForm.reset();

		setTimeout(() => {
			responseDataLogin.innerHTML = '';
		}, 3500);
	} else if (params.errors) {

		let html = `<div class="alert alert-danger role="alert">`;
               html += `<ul class="lista">`;
               params.errors.forEach(err => {
                    html += `
                         <li>${err}</li>
                    `;
               })
			   html += `</ul>
			   	</div>`;

		responseDataLogin.innerHTML = html;

		setTimeout(() => {
			responseDataLogin.innerHTML = '';
		}, 4500);
	}
}