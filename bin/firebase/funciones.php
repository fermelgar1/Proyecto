<?php
    include("conexion.php");
?>
<script>
    //crea usuarion en firebase con correo electronico;
    var usuario;
    function crearUsuario(email, password) {

        firebase.auth().createUserWithEmailAndPassword(email, password).catch(function (error) {
            //Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            alert("error = " + errorMessage + +email + "  " + password)
            // ...
        });
    }
    
    function writeUserData(userId, name, email, tipo) {
        firebase.database().ref('usuarios/empleados' + userId).set({
            username: name,
            email: email,
            tipo: tipo
        });
        alert("done");
    }
    
    //funcion para logearte con correo y contraseña
    function logIn(email, password) {
        firebase.auth().signInWithEmailAndPassword(email, password).catch(function (error) {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            aler("error = " + errorMessage + " password" + email + " email " + password);
            // ...
        });
        RevisarUsuario();
        //esta funcion revisa si el ingreso fue correcto, y obtiene los datos del usuario
    }


    //esta funcion hace un logOut
    function logOut() {
        firebase.auth().signOut().then(function () {
            // Sign-out successful.
        }).catch(function (error) {
            // An error happened.
        });
    }

    function RevisarUsuario(){
        firebase.auth().onAuthStateChanged(function (user) {
            if (user) {
                usuario = user;
                var displayName = user.displayName;
                var email1 = user.email;
                var emailVerified = user.emailVerified;
                var photoURL = user.photoURL;
                var isAnonymous = user.isAnonymous;
                var uid = user.uid;
                var providerData = user.providerData;
                // ...
                alert("logeado " + user.email);
               // return user;
            } else {
                alert("contraeña incorrecta");
                // User is signed out.
                // ...
            }
        });
    }
</script>