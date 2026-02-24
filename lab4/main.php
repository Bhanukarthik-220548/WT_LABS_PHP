<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div id="main">
        <div class="navbar">
            <div class="title">
                <a href="#content"><p>Home</p></a> 
                <a href="#recipe"><p>Recipes</p></a>
                <a href="#contact"><p>Contact</p></a>
                 <a href="#aboutus"><p>About Us</p></a>
            </div>
        </div>
        <div class="content">
            <h1>Welcome to Food Court</h1>
            <p>Your only destination for food</p>
        </div>
    </div>
    <div id="recipe">
        <div class="cat">
            <h1>Categories</h1>
        </div>
        <div class="name">
            <a href="#item1"><p>Tiffins</p></a>
            <a href="#item2"><p>Biryani</p></a>
            <a href="#item3"><p>Fastfood</p></a>
            <a href="#item4"><p>Beverages</p></a>
        </div> 
            <div id="item1">
                <h1>Tiffins</h1>
                <div class="i1">
                    <img src="dosa.jpg" alt="birayani" width="200px" height="200px">
                    <p>Dosa</p>
                    <p>price: ₹30</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="idly.jpg" alt="birayani" width="200px" height="200px">
                    <p>Idly</p>
                    <p>price: ₹20</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="vada.webp" alt="birayani" width="200px" height="200px">
                    <p>Vada</p>
                    <p>price: ₹25</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="puri.png" alt="birayani" width="200px" height="200px">
                    <p>Puri</p>
                    <p>price: ₹25</p>
                    <button>order</button>
                </div>
            </div>
            <div id="item2">
                <h1>Biryani</h1>
                <div class="i1">
                    <img src="birayani.jpg" alt="birayani" width="200px" height="200px" >
                    <p>birayani</p>
                    <p>price: ₹120</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="rambo.webp" alt="birayani" width="200px" height="200px">
                    <p>Rambo birayani</p>
                    <p>price: ₹150</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="sp.webp" alt="birayani" width="200px" height="200px">
                    <p>SP birayani</p>
                    <p>price: ₹150</p>
                    <button>order</button>
                </div>
            </div>
            <div id="item3">
                <h1>Fastfood</h1>
                <div class="i1">
                    <img src="cf.webp" alt="birayani" width="200px" height="200px">
                    <p>Chicken fried rice</p>
                    <p>price: ₹80</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="vf.webp" alt="birayani" width="200px" height="200px">
                    <p>Veg fried rice</p>
                    <p>price: ₹70</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="manchurian.jpg" alt="birayani" width="200px" height="200px">
                    <p>Manchurian</p>
                    <p>price: ₹80</p>
                    <button>order</button>
                </div>
                 <div class="i1">
                    <img src="noodles.jpg" alt="birayani" width="200px" height="200px">
                    <p>Noodles</p>
                    <p>price: ₹80</p>
                    <button>order</button>
                </div>
            </div>
            <div id="item4">
                <h1>Beverages</h1>
                <div class="i1">
                    <img src="thumps.webp" alt="birayani" width="200px" height="200px">
                    <p>Thumps Up</p>
                    <p>price: ₹20</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="moutain.webp" alt="birayani" width="200px" height="200px">
                    <p>Mountain Dew</p>
                    <p>price: ₹20</p>
                    <button>order</button>
                </div>
                <div class="i1">
                    <img src="mirinda.jpg" alt="birayani" width="200px" height="200px">
                    <p>Mirinda</p>
                    <p>price: ₹20</p>
                    <button>order</button>
                </div>
            </div>
       </div> 
    </div>
    <div id="contact">
        <p>dial:123456789</p>
          <p>dial:123456789</p>
        <a href="complaint.html" style="color: red;margin-top:10px;font-size: 25px;">For complaints </a>
    </div>
    <div id="aboutus">
        <h2>rgukt food court</h2>
        <p>all rights reserved</p>
    </div>
    <script>
        let a=5
        var b=10
        const c=3.14
        console.log(a)
        console.log(c)
        function hi(){
            var b=11
            let a=6
            console.log("website has no issues")
            console.log(a)
        }
        hi();

        function hii(d,e){
            console.log(d,e)
        }
        const d=2
        const e=3
        hii(d,e);   

        function c(){
            return "welcome to food court"
        }
        C();
    </script>
</body>
</html>