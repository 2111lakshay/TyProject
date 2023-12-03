<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee RollBoxes</title>

    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <!-- <link rel="stylesheet" href="css/rollboxestyle.css" /> -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
      integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
      integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
      crossorigin="anonymous"
    ></script>
    <style>
      html {
        background-color: #fff;
      }
      body {
        background-color: #ffffff;
        background: linear-gradient(
          to right,
          white 0%,
          white 50%,
          rgb(53, 92, 175) 50%,
          rgb(53, 92, 175) 100%
        );
        margin: 40px;
        padding: 10px;

        border: 1px solid black;
        border-radius: 5px;
        box-shadow: 0px 0px 20px 5px rgba(0, 0, 0, 0.966);
      }

      .container img {
        mix-blend-mode: multiply;
      }

      .card {
        width: 70%;
        background-color: rgb(53, 92, 175);
        border: 2px solid;
        border-radius: 20px;
        margin-left: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-top: 0px;
      }
      .card:hover {
        box-shadow: 1px 1px 30px 1px rgba(2, 3, 51, 0.966);
      }

      .card h5 {
        color: white;
        font-size: 20px;
        font-family: "Times New Roman", Times, serif;
        text-align: center;
        text-decoration: double;
        text-transform: capitalize;
      }

      .card img {
        height: 220px;
        width: 10x;
        margin: 10px 50px 10px px;
        border-radius: 100%;
      }
      .card a {
        text-decoration: none;
      }

      .card a:hover {
        color: black;
        background-color: white;
      }
      .btn1 {
        margin: 0 0 -30px 950px;
      }
      .btn1 a {
        font-family: "Times New Roman", Times, serif;
        font-weight: 300;
        border: 1px solid;
        width: 30%;
        display: flex;
        justify-content: center;

        background-color: #000000;
        color: #fff;
      }
      .btn1 a:hover {
        background-color: white;
      }
     
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="logo">
        <img src="images/logo.png" alt="" srcset="" height="80" width="80" />
        <img src="images/logo (3).png" alt="" srcset="" height="80" />
      </div>
     
      <div class="btn1">
        <a
          href="EmpLogin.php"
          style="padding-right: 25px; padding-left: 25px"
          class="btn btn-block"
          >EXIT</a
        >
      </div>
    </nav>

    <div class="container mt-5" id="cardContainer">
    <div class="row justify-content-center" id="cardRow">
      <?php
      
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // $numberOfCards = isset($_POST["numOfCards"]) ;
          $boxnumber = isset($_POST["numOfCards"]);
          echo '<div class="col-md-2 row-cols-md-2">
                    <div class="card">
                        <div class="card-body">
                            <a href="EmpRollDetails.php">
                                <h5 class="card-title">Box:' .$boxnumber. '</h5>
                            </a>
                        </div>
                    </div>
                </div>';
        
        }
      ?>
  </div>
</div>

<script>
  var cardlist = []

  var lscard = localStorage.getItem("cardlist");
  if (lscard != null) {
    lscard = JSON.parse(lscard);
    for(let i=0;i < lscard.length;i++){
      cardlist.push(lscard[i])
      addCardsstart(lscard[i])
    }
    console.log(lscard,"cardlosyt");
    console.log(cardlist,"cfhdfardlosyt");
  }
  
  console.log(localStorage.getItem("cardlist"));


  function addCardsstart(num) {
    var cardRow = document.getElementById("cardRow");

    var boxnumber = num;
    var newCard = document.createElement("div");
    newCard.id = "crd" + boxnumber;
    newCard.className = "col-md-2 row-cols-md-2";
    newCard.innerHTML = `
      <div class="card">
        <div class="card-body">
          <a href="EmpRollDetails.php">
            <h5 class="card-title">Box:${boxnumber} </h5>
          </a>
        </div>
      </div>
    `;

    cardRow.appendChild(newCard);
  }

      
  function addCards() {
    var cardRow = document.getElementById("cardRow");

    var boxnumber = parseInt(document.getElementById("numOfCards").value);
    var newCard = document.createElement("div");
    newCard.id = "crd" + boxnumber;
    newCard.className = "col-md-2 row-cols-md-2";
    newCard.innerHTML = `
      <div class="card">
        <div class="card-body">
          <a href="EmpRollDetails.html">
            <h5 class="card-title">Box:${boxnumber} </h5>
          </a>
        </div>
      </div>
    `;

    cardRow.appendChild(newCard);
    cardlist.push(boxnumber);
    console.log(cardlist);
    var strcardlist = JSON.stringify(cardlist);
    localStorage.setItem("cardlist",strcardlist);
    console.log(localStorage.getItem("cardlist")  )
  }
  // function deleteCard() {
  //   var cardRow = document.getElementById("cardRow");
  //   var deleteBoxNumber = parseInt(document.getElementById("deleteBoxNumber").value);

  //   var cards = cardRow.getElementsByClassName("card");
  //   for (var i = 0; i < cards.length; i++) {
  //     var card = cards[i];
  //     var cardBoxNumber = parseInt(card.querySelector(".card-title").textContent.split(":")[1]);

  //     if (cardBoxNumber === deleteBoxNumber) {
  //       cardRow.removeChild(card);
  //       return; // Exit the function after deleting the card
  //     }
  //   }

  //   alert("No card found with the specified box number.");
  // }
  function deleteCard() {
    var cardRow = document.getElementById("cardRow");
    var deleteBoxNumber = parseInt(document.getElementById("deleteBoxNumber").value);
    var cards = cardRow.getElementsByClassName("card");
    var  delcard = document.getElementById("crd" + deleteBoxNumber).style.display = "none";
    // for (var i = 0; i < cards.length; i++) {
    //     var card = cards[i];
    //     var cardTitleElement = card.querySelector(".card-title");
    //     var cardTitle = cardTitleElement ? cardTitleElement.textContent : "";
    //     console.log("Card Title:", cardTitle);
        
    //     var cardBoxNumber = parseInt(cardTitle.split(":")[1].trim());
    //     if (cardBoxNumber === deleteBoxNumber) {
    //         cardRow.removeChild(card);
    //         return; // Exit the function after deleting the card
    //     }
    // }

    var index = cardlist.indexOf(deleteBoxNumber);
    if(index > -1){
      cardlist.splice(index,1);
    }
    console.log(cardlist);
    var strcardlist = JSON.stringify(cardlist);
    localStorage.setItem("cardlist",strcardlist);
    console.log(localStorage.getItem("cardlist"))
    alert("Box is Deleted.");
}

</script>

  </body>
</html>
