@extends('layouts.app')
@section('content')

<div class="card">
<div class="card-header">
    Post-Upload Firebase
</div>

<div class="card-body">
    <form action="{{ route('teacher.firebase-upload') }}" method="post" id="upload-form">
        @csrf

    <div class="form-group">
        <label for="">Text:</label>
        <textarea name="text" id="text-field" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="">File:</label>
        <input type="file" id="input-file" class="form-control">
    </div>
        
    <button class="btn btn-primary" onclick="firebaseUpload(event)">Upload File</button>
    </form>
</div>
</div>


@section('scripts')
<script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-storage.js"> </script>
<script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-messaging.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-functions.js"></script>


<script>

const firebaseUpload = function(event) {
    event.preventDefault();
    var firebaseConfig = {
    apiKey: "AIzaSyCZhsVx8yozG3smh-ojl5f3A_hkh99YccE",
    authDomain: "laravel-firbase-e5551.firebaseapp.com",
    databaseURL: "https://laravel-firbase-e5551.firebaseio.com",
    projectId: "laravel-firbase-e5551",
    storageBucket: "laravel-firbase-e5551.appspot.com",
    messagingSenderId: "439155288540",
    appId: "1:439155288540:web:212c3ed06a8fc2ec858719",
    measurementId: "G-1BV1XNS8EP"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  let storageRef = firebase.storage().ref();
  const file = document.getElementById('input-file').files[0];
  let fileRef = storageRef.child('documents/'+file.name);
  
  fileRef.put(file).then(function(response){
    fileRef.getDownloadURL().then(function(url){
        const form = document.getElementById('upload-form');
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'url';
        input.value = `${url}`;
        form.append(input);
        form.submit();
    });
  });

 
  

  
}

  // Your web app's Firebase configuration
  
</script>

@endsection
@endsection

