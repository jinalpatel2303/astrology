<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
      
        margin-top: 176px;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
/*      box-shadow: 4px 4px 20px rgb(255 186 51 / 30%);*/
        box-shadow:2px 2px 15px rgb(128 128 128 / 40%);
        display: inline-block;
        margin: 0 auto;
      }

.confirmation-btn button{
    width: 150px;
    height: 45px;
    border-radius: 8px;
    border: none;
    background-color: #ffba33;
    margin-top: 30px;
    transition:all 0.5s ease;
}
.confirmation-btn button:hover{
    background-color:black;
    box-shadow: 0px 0px 211px black;
}
.confirmation-btn button:hover a{
    color:white;
}
.confirmation-btn button a{
    text-transform: capitalize;
    text-decoration: none;
    font-size: 18px;
    color: black;
    font-weight: 600;
    display:block;
}

    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We received your payment;<br/> we'll be in touch shortly!</p>


                    <div class="confirmation-btn">
                        <button type="submit" id="submit3">
                             <a href="{{url('/')}}">Back to Home </a>
                                      
                         </button>
                     </div>
      </div>

                                

    </body>
</html>