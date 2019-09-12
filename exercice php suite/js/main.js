function myFunction() {
    var x = document.getElementById("mySelect").value;
    

    if (x == "clavier") {
        //pour le input
        document.getElementById("prix").value = "15" ;
        //pour afficher le prix clavier
        document.getElementById("prix1").innerHTML = "15" ;
    }
    if (x == "souris") {
        //pour le input
        document.getElementById("prix").value = "30" ;
        //pour afficher le prix souris

        document.getElementById("prix1").innerHTML = "30" ;
    }
    if (x == "webcam") {
        //pour le input
        document.getElementById("prix").value = "78" ;
        //pour afficher le prix clavier webcam

        document.getElementById("prix1").innerHTML = "78" ;
    }


    
    
  }