<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Alegreya+Sans+SC&family=Athiti:wght@500&family=Bai+Jamjuree&family=Bebas+Neue&family=Comfortaa:wght@600&family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&family=Jost:wght@400;600&family=Onest:wght@100..900&family=Oswald:wght@200..700&family=Play&family=Poor+Story&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Revolution&family=Quicksand&family=Rajdhani:wght@300;400;500;600;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sixtyfour&display=swap" rel="stylesheet" />
    <style>
        html {
            scroll-behavior: smooth;
        }

        .sidebar-container {
            width: 100%;
            position: fixed;
            backdrop-filter: blur(20px);
        }
    </style>
</head>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maji";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<script>
    fetch('topbar.php')
        .then(response => response.text())
        .then(data => {
            var topbarContainer = document.getElementById('topbar');
            if (topbarContainer) {
                // Update the content of the popup
                topbarContainer.innerHTML = data;
            }
        })
        .catch(error => console.error('Error:', error));


    function getCurrentDate() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        var yyyy = today.getFullYear();

        return yyyy + '-' + mm + '-' + dd;
    }

    document.addEventListener('DOMContentLoaded', function() {
        var storedDate = localStorage.getItem('selectedDate');
        document.getElementById('selectedDate').value = storedDate || getCurrentDate();
        var form = document.querySelector('form');

        if (form) {
            form.addEventListener('submit', function() {
                localStorage.setItem('selectedDate', document.getElementById('selectedDate').value);
            });
        }
    });

    function popup(tableName, status) {
        if (status == 'ว่าง') {
            fetch('popup.php?tableName=' + tableName)
                .then(response => response.text())
                .then(data => {
                    var popupContainer = document.getElementById('popupDisplay');
                    if (popupContainer) {
                        // Update the content of the popup
                        popupContainer.innerHTML = data;

                        document.getElementById('confirmButton').setAttribute('onclick', 'confirm("' + tableName + '")');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    }

    function confirm(tableName) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateStatus.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                console.log(tableName);
                location.reload();
            }
        };
        xhr.send('tableName=' + tableName);
    }

    function cancel() {
        var popupContainer = document.getElementById('popupDisplay');
        if (popupContainer) {
            popupContainer.innerHTML = '';
        }
    }
</script>


<body class="bg-white" style="
      font-family: Prompt, sans-serif;
      font-weight: 300;
      font-style: normal;
    ">
    <div id="topbar"></div>
    <div id="popupDisplay"></div>
    <div class="flex justify-center items-center">
        <div class="flex flex-wrap justify-center items-center">
            <div class="box-border w-90 p-4 mt-10 bg-gray-100 rounded-3xl flex justify-center items-center selfs-center">
                <div class="w-50">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="flex items-center">
                        <input type="date" id="selectedDate" name="selectedDate" class="block w-30 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" required>
                        <button type="submit" class="ml-4 bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded transition duration-300">Submit</button>
                    </form>
                    <p class="font-[20%] font-medium text-center text-5xl mb-8"> เลือกโต๊ะ</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8 p-4 ">
                        <?php
                        $sql = "SELECT tableTypeId, tableTypeStatus FROM tabletype";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $countStatusgreen = 0;
                            $countStatusred = 0;
                            while ($row = $result->fetch_assoc()) {
                                $tableName = $row['tableTypeId'];
                                $status = $row['tableTypeStatus'];

                                echo '<div onclick="popup(\'' . $tableName . '\', \'' . $status . '\')" id="' . $tableName . '" class="rounded-full bg-white w-32 h-24 flex items-center justify-center text-black border-8 ';

                                if ($status == 'ว่าง') {
                                    echo 'border-green-500';
                                    $countStatusgreen++;
                                } elseif ($status == 'ไม่ว่าง') {
                                    echo 'border-red-500';
                                    $countStatusred++;
                                }

                                echo ' shadow-lg hover:scale-110 transition-transform duration-100 hover:animate-pulse">';

                                echo '<p class="text-center" name="customer"><span class="font-bold text-lg" name="table">' . $tableName . '</span><br>' . $status . '</p>';
                                echo '</div>';
                            }
                        } else {
                            echo "No results";
                        }


                        ?>
                    </div>
                    <div class="flex justify-center ml-1 mt-5">
                        <p class="font-[20%] font-medium text-center mr-5">สถานะ</p>
                        <span class="rounded-full bg-green-500 w-5 h-5 flex text-center whitespace-nowrap">
                            <p class="ml-7" name="statusfree">ว่าง <?php echo $countStatusgreen ?></p>
                        </span>
                        <span class="rounded-full bg-red-500 w-5 h-5 flex text-center ml-20 whitespace-nowrap">
                            <p class="ml-7" name="statusbusy">ไม่ว่าง <?php echo $countStatusred ?></p>
                        </span>
                    </div>
                </div>
                <div class="w-60">
                    <form class="rounded-full">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 " placeholder="Search" required />
                            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-red-700 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Search</button>
                        </div>
                    </form>
                    <div class="overflow-y-auto max-h-80">
                        <?php

                        $reservationQuery = "SELECT reservationId, custId, tableTypeId, Date(appointmentDateTime) AS date, TIME(appointmentDateTime) AS time, peopleReserved FROM reservation";
                        $reservationResult = $conn->query($reservationQuery);

                        if ($reservationResult === FALSE) {
                            echo "Error: " . $conn->error;
                        } else {
                            while ($row = $reservationResult->fetch_assoc()) {
                                $reservationId = $row['reservationId'];
                                $customerId = $row['custId'];
                                $tableName = $row['tableTypeId'];
                                $date = $row['date'];
                                $time = $row['time'];
                                $numberOfPeople = $row['peopleReserved'];

                                $selectedDate = $_POST['selectedDate'];

                                if ($selectedDate == $date) {
                                    $customerNameQuery = "SELECT custName FROM customer WHERE custId = '$customerId'";
                                    $customerNameResult = $conn->query($customerNameQuery);

                                    if ($customerNameResult === FALSE) {
                                        echo "Error fetching customer name: " . $conn->error;
                                    } else {
                                        $customerNameRow = $customerNameResult->fetch_assoc();
                                        $customerName = $customerNameRow['custName'];


                                    }

                                    $formattedTime = date('H:i', strtotime($time));

                                    echo '<div class="rounded-full box-border bg-gray-300 hover:bg-gray-500 hover:text-black p-1 m-2">';
                                    echo '<span class="flex rounded-full bg-gray-200 w-10 h-10 p-2 whitespace-nowrap">' . $tableName . '<p class="ml-10">' . $customerName . '<span class="ml-10">' . $numberOfPeople . ' คน</span><span class="ml-10">' . $formattedTime . '</span></p> </span>';
                                    echo '</div>';
                                }
                            }
                        }

                        ?>
                    </div>
                    <div class="flex justify-center gap-2 mt-4">
                        <button class="bg-red-500 hover:bg-red-700 text-white  p-2 rounded-full">ยกเลิก</button>
                        <button class="bg-green-500 hover:bg-green-700 text-white  p-2 rounded-full">เช็คอิน</button>
                    </div>

                </div>

            </div>
        </div>


    </div>
    </div>

    <?php
    $conn->close();
    ?>

</body>

</html>