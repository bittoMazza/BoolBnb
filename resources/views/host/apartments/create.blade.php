@extends('layouts.app')

@section('content')
    <h2 class="text-center mt-5">Inserisci l'appartamento</h2>
    <div class="col-4 p-3 m-3 mx-auto bg-dark rounded-4">
        <form id="form_apartment" action="{{ route('host.apartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            @include('host.apartments.forms.form')
            <script>
                const file = document.getElementById("file");
                const form = document.getElementById('form_apartment');
                file.addEventListener('change', e => {
                    if (!validateInput()) {
                        e.preventDefault();
                        console.log('false');
                    } else {
                        console.log('true');
                        return true;
                    }
                });

                // function fileValidation() {
                    
                //     var filePath = fileInput.value;

                //     if (!allowedExtensions.exec(filePath)) {
                //         alert('Invalid file type');
                //         fileInput.value = '';
                //         return false;
                //     }
                // }

                    // messaggi d'errore e di successo
                    const setError = (element, message) => {
                        const inputControl = element.parentElement;
                        const errorDisplay = inputControl.querySelector('.error');

                        errorDisplay.innerText = message;
                        inputControl.classList.add('error');
                        inputControl.classList.remove('success')
                    };

                    const setSuccess = element => {
                        const inputControl = element.parentElement;
                        const errorDisplay = inputControl.querySelector('.error');

                        errorDisplay.innerText = '';
                        inputControl.classList.add('success');
                        inputControl.classList.remove('error');
                    };
                    // messaggi d'errore e di successo

                    // validazione se file image è vuoto
                    const validateInput = () => {
                        const fileValue = file.files.length;
                        console.log(file.value);
                        if (fileValue == 0) {
                            setError(file, 'Seleziona un file');
                            console.log('falso');
                            return false;
                        } else {
                            setSuccess(file);
                            console.log('vero');
                        }
                    };
                    // validazione se file image è vuoto
            </script>
        </form>
    </div>
@endsection
