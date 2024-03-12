<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <style>
        body {
            font-family: Prompt, sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .menu-item {
            width: 20%;
            margin: 2rem;
            padding: 1rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            align-items: center;
            transition: transform 0.3s ease-in-out;
        }

        .menu-item img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .menu-item:hover {
            transform: scale(1.05);
        }

        @media (min-width: 375px) {
            .md\:inset-0 {
                inset: 0;
            }
        }
    </style>
    <script src="fetchmainNav.js"></script>
    <script src="fetchNavbar.js"></script>
    <script src="fetchBasket.js"></script>


</head>

<body class="bg-white">

    <div id="topbar">
        <nav id="1">
            <div class="flex justify-between h-[6rem] px-10 shadow items-center smooth">
                <div class="flex space-x-1 items-center flex-shrink-0 animate-pulse ">
                    <a href="../home/index.html">
                        <img src="logo.png" width="130px" height="130px" class="self-center ml-[-20%] mt-[1%] transform hover:scale-105 transition-transform duration-100" /></a>

                </div>
                <button id="toggleMenu" class="sm:hidden inline-flex items-center justify-center p-2 w-10 h-10 text-sm rounded-lg text-gray-400 transform hover:scale-105 transition-transform duration-100" aria-controls="navbar-hamburger" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>

                <div class="flex space-x-4 items-center hidden sm:flex text-nowrap">
                    <a href="../reservation/index.html" class="px-4 text-red-700 text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 ">สำรองที่นั่ง</a>
                    <a href="../login/login.html" class="text-red-700 text-sm transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100">เข้าสู่ระบบ</a>
                    <a href="../signup/signup.html" class="px-4 py-2 rounded text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm">สมัครสมาชิก</a>
                    <div class="divide-x"></div>
                    <a href="../delivery/index.html" class="ml-4 flex justify-center text-center text-bold px-4 py-2 items-center rounded-full text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm bg-gray-50 shadow-white">
                        <svg class="animate-pulse mr-2" fill="#D54224" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px" viewBox="0 0 612 612" xml:space="preserve" stroke="#ec2222">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path d="M226.764,375.35c-28.249,0-51.078,22.91-51.078,51.16c0,28.166,22.829,51.078,51.078,51.078s51.078-22.912,51.078-51.078 C277.841,398.26,255.013,375.35,226.764,375.35z M226.764,452.049c-14.125,0-25.54-11.498-25.54-25.541 c0-14.123,11.415-25.539,25.54-25.539c14.124,0,25.539,11.416,25.539,25.539C252.302,440.551,240.888,452.049,226.764,452.049z M612,337.561v54.541c0,13.605-11.029,24.635-24.636,24.635h-26.36c-4.763-32.684-32.929-57.812-66.927-57.812 c-33.914,0-62.082,25.129-66.845,57.812H293.625c-4.763-32.684-32.93-57.812-66.845-57.812c-33.915,0-62.082,25.129-66.844,57.812 h-33.012c-13.606,0-24.635-11.029-24.635-24.635v-54.541H612L612,337.561z M494.143,375.35c-28.249,0-51.16,22.91-51.16,51.16 c0,28.166,22.912,51.078,51.16,51.078c28.166,0,51.077-22.912,51.077-51.078C545.22,398.26,522.309,375.35,494.143,375.35z M494.143,452.049c-14.125,0-25.539-11.498-25.539-25.541c0-14.123,11.414-25.539,25.539-25.539 c14.042,0,25.539,11.416,25.539,25.539C519.682,440.551,508.185,452.049,494.143,452.049z M602.293,282.637l-96.817-95.751 c-6.159-6.077-14.453-9.526-23.076-9.526h-48.86v-18.313c0-13.631-11.004-24.635-24.635-24.635H126.907 c-13.55,0-24.635,11.005-24.635,24.635v3.86L2.3,174.429l177.146,23.068L0,215.323l178.814,25.423L0,256.25l102.278,19.29 l-0.007,48.403h509.712v-17.985C611.983,297.171,608.452,288.796,602.293,282.637z M560.084,285.839h-93.697 c-2.135,0-3.86-1.724-3.86-3.859v-72.347c0-2.135,1.725-3.86,3.86-3.86h17.82c0.985,0,1.971,0.411,2.71,1.068l75.796,72.347 C565.257,281.569,563.532,285.839,560.084,285.839z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        สั่งอาหารทันที
                    </a>
                    <a href="../signup/signup.html" class="px-4 py-2 rounded text-white transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm"></a>
                </div>
            </div>
            <div class="hidden w-full mb-10" id="navbar-hamburger">
                <ul class="flex flex-col font-medium rounded-lg justify-center items-center bg-gray-50">
                    <li>
                        <a href="../reservation/index.html" class="block ml-2 py-2 px-3 text-red-700 hover:text-red-950">สำรองที่นั่ง</a>
                    </li>
                    <li>
                        <a href="../login/login.html" class="block ml-2 py-2 px-3 text-red-700 hover:text-red-950">เข้าสู่ระบบ</a>
                    </li>
                    <li>
                        <a href="../signup/signup.html" class="block ml-2 py-2 px-3 text-red-700 hover:text-red-950">สมัครสมาชิก</a>
                    </li>
                    <li>
                        <a href="../signup/signup.html" class="ml-1 flex text-center text-bold px-4 py-2 items-center rounded-full text-red-700 transform hover:scale-[120%] hover:text-red-500 transition-transform duration-100 text-sm bg-gray-50 shadow-white">
                            <svg class="animate-pulse mr-2" fill="#ec2222" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px" viewBox="0 0 612 612" xml:space="preserve" stroke="#ec2222">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g>
                                        <g>
                                            <path d="M226.764,375.35c-28.249,0-51.078,22.91-51.078,51.16c0,28.166,22.829,51.078,51.078,51.078s51.078-22.912,51.078-51.078 C277.841,398.26,255.013,375.35,226.764,375.35z M226.764,452.049c-14.125,0-25.54-11.498-25.54-25.541 c0-14.123,11.415-25.539,25.54-25.539c14.124,0,25.539,11.416,25.539,25.539C252.302,440.551,240.888,452.049,226.764,452.049z M612,337.561v54.541c0,13.605-11.029,24.635-24.636,24.635h-26.36c-4.763-32.684-32.929-57.812-66.927-57.812 c-33.914,0-62.082,25.129-66.845,57.812H293.625c-4.763-32.684-32.93-57.812-66.845-57.812c-33.915,0-62.082,25.129-66.844,57.812 h-33.012c-13.606,0-24.635-11.029-24.635-24.635v-54.541H612L612,337.561z M494.143,375.35c-28.249,0-51.16,22.91-51.16,51.16 c0,28.166,22.912,51.078,51.16,51.078c28.166,0,51.077-22.912,51.077-51.078C545.22,398.26,522.309,375.35,494.143,375.35z M494.143,452.049c-14.125,0-25.539-11.498-25.539-25.541c0-14.123,11.414-25.539,25.539-25.539 c14.042,0,25.539,11.416,25.539,25.539C519.682,440.551,508.185,452.049,494.143,452.049z M602.293,282.637l-96.817-95.751 c-6.159-6.077-14.453-9.526-23.076-9.526h-48.86v-18.313c0-13.631-11.004-24.635-24.635-24.635H126.907 c-13.55,0-24.635,11.005-24.635,24.635v3.86L2.3,174.429l177.146,23.068L0,215.323l178.814,25.423L0,256.25l102.278,19.29 l-0.007,48.403h509.712v-17.985C611.983,297.171,608.452,288.796,602.293,282.637z M560.084,285.839h-93.697 c-2.135,0-3.86-1.724-3.86-3.859v-72.347c0-2.135,1.725-3.86,3.86-3.86h17.82c0.985,0,1.971,0.411,2.71,1.068l75.796,72.347 C565.257,281.569,563.532,285.839,560.084,285.839z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            สั่งอาหารทันที
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="w-full" style="width: 100vw; height: 20vh;">
        <img src="wallpaper.jpg" style="width: 100%; height: 100%; object-fit: cover;">
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleMenu = document.getElementById('toggleMenu');
            const navbarHamburger = document.getElementById('navbar-hamburger');

            toggleMenu.addEventListener('click', function() {
                navbarHamburger.classList.toggle('hidden');
            });
        });
    </script>
    
    </div>
    <div class="flex justify-center">
        <div id="navbar" class="flex text-nowrap p-6 z-10 overflow-x-auto ml-[10%] mr-[10%]  "></div>
    </div>
    <p id="demo" class="text-black"></p>

    <div class="grid w-full h-screen sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-4">
        <div class="md:col-span-3 sm:col-span-4 items-center justify-center">

            <?php
            if (isset($_GET['menuTypeId'])) {

                $menuTypeId = $_GET['menuTypeId'];
            } else {
                $menuTypeId = 6;
            }

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "maji";

            // Create connection <div id="basket" class="w-w-1/4"></div>
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM menu WHERE menuTypeID = $menuTypeId;";
            $result = mysqli_query($conn, $sql);
            echo '<form  method="get" class="grid place-content-center mr-[8%] ml-[8%] sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-1 mt-[5%]"> ';

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $menuId = $row['menuId'];
                    $menuImage = $row['menuImage'];
                    $menuName = $row['menuName'];
                    $menuDescription = $row['menuDescription'];
                    $menuPrice = $row['menuPrice'];
                    $menuTime = $row['menuTime'];

                    echo '<div class="menu-item w-[75%] h-70 content-center text-pretty mt-[3%] bg-white border border-gray-200 rounded-lg">
                         <div class="flex justify-between"> 
                            <p class="text-black text-sm text-pretty"> </p>
                            <p class="text-red-500 text-sm text-pretty">' . $menuTime . ' นาที</p>
                         
                         </div>   
                            <img class="h-30 object-cover mb-2" src="' . $menuImage . '" alt="' . $menuName . '">
                            <p class="text-black text-pretty">' . $menuName . '</p>
                            <p class="text-amber-500 text-sm text-pretty">' . $menuDescription . '</p>
                            <p class="text-black mt-2">' . '฿' . $menuPrice . '.-</p>
                            <button type="submit" onclick="addBasket(' . $menuId . ',\'' . $menuName . '\')" name="order_menu" class="mt-2 text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-900 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                สั่งอาหาร
                            </button>
                        </div>';
                }
            } else {
                echo "0 results";
            }
            echo "</form>";

            // Close connection
            mysqli_close($conn);
            ?>

        </div>
        <div class="w-full flex justify-center mb-4 p-10">
            <div id="basket" class="justify-center"></div>
        </div>
    </div>

</body>

<script>
    function addBasket(menuId, menuName) {
        var menuQuantity = prompt("กรุณากรอกจำนวนเมนู " + menuName);

        if (menuQuantity !== null && !isNaN(menuQuantity) && menuQuantity > 0) {
            updateSesstionBasket(menuId, menuName, menuQuantity);
            alert("เพิ่ม" + menuQuantity + "จำนวนของเมนู" + menuName + " ลงตะกร้าเรียบร้อย");
        } else {
            alert("กรุณากรอกจำนวนเมนู");
        }
    }

    function updateSesstionBasket(menuId, menuName, menuQuantity) {
        console.log(menuId);
        console.log(menuName);
        console.log(menuQuantity);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateSessionBasket.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText.trim();
                console.log(result);
                location.reload();
            }
        };
        xhr.send('menuId=' + menuId + '&menuName=' + menuName + '&menuQuantity=' + menuQuantity);
    }
</script>




</html>