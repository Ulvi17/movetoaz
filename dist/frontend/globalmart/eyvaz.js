function redirecturl(url, target = "_self") {
    if (target == '_self')
        window.location.href = url;
    else
        window.open(url);
}

function showLoader() {
    var loader = document.getElementById("loader");
    if (loader)
        loader.style.display = "block";
}

function hideLoader() {
    var loader = document.getElementById("loader");
    if (loader)
        loader.style.display = "none";
}

showLoader();


function submitPropertyRequest(event) {
    event.preventDefault(); // Formun default göndərilməsini bloklayır

    const form = event.target;
    const formData = new FormData(form);
    const alertBox = document.getElementById('alert_box');

    // Əgər Laravel CSRF tokeni varsa, onu da əlavə et (əks halda backend qəbul etməyəcək)
    const token = document.querySelector('input[name="_token"]').value;

    fetch(form.action, {
        method: form.method,
        headers: {
            'X-CSRF-TOKEN': token
        },
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            alertBox.innerText = data.message || 'Your request was submitted successfully.';
            alertBox.classList.add('alert-success');

            setTimeout(() => {
                form.reset(); // Formu sıfırla
                alertBox.innerText = '';
                alertBox.classList.remove('alert-success');
            }, 1500);
        })
        .catch(error => {
            console.error('Error:', error);
            alertBox.innerText = 'There was an error submitting your request.';
            alertBox.classList.add('alert-danger');

            setTimeout(() => {
                alertBox.innerText = '';
                alertBox.classList.remove('alert-danger');
            }, 2500);
        });

    return false; // Formun default göndərilməsinin qarşısını alır
}
