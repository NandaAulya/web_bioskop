<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Selection</title>
    <style>
        .seat {
            transition: background-color 0.3s ease;
        }
        .seat.booked {
            cursor: not-allowed;
            pointer-events: none;
            background-color: red; /* Adjust as needed */
        }
        .seat.your-seat {
            background-color: yellow; /* Adjust as needed */
        }
        .seat.available {
            background-color: green; /* Adjust as needed */
        }
        .grid-cols-10 > *:nth-child(5n+6) {
            margin-left: 20px;
        }
    </style>
</head>

<body style="background-color: #060614">

    <header>
        <?php 
        include 'config/config.php';
        include 'controller/controllerPenayangan.php';

        // Get penayangan ID from query parameter
        if (!isset($_GET['book']) || empty($_GET['book'])) {
            echo "<div style='color: #e4e5f7; text-align: center; padding: 20px;'>Invalid penayangan ID.</div>";
            exit;
        }

        $id_penayangan = $_GET['book'];
        $seats = getAllSeats($id_penayangan);

        if (!$seats) {
            echo "<div style='color: #e4e5f7; text-align: center; padding: 20px;'>Failed to retrieve seat information.</div>";
            exit;
        }
        ?>
    </header>

    <div class="flex flex-col items-center pt-20 px-20">
        <div class="w-full max-w-screen-lg font-poppins">
            <h1 class="text-5xl font-bold mb-4 capitalize" style="color: #9398e0;">Seat Selection</h1>
        </div>

        <div class="w-full max-w-screen-lg">
            <div class="grid grid-cols-10 gap-6 mt-20 mb-8">
                <?php
                while ($seat = $seats->fetch_assoc()) {
                    $status = $seat['status'] == 'terjual' ? 'booked' : 'available';
                    echo '<input type="checkbox" name="tickets" id="s' . $seat['id_pemesanan'] . '" class="hidden" />
                          <label for="s' . $seat['id_pemesanan'] . '" class="seat ' . $status . ' w-[30px] h-[30px] rounded-sm border border-gray-400 cursor-pointer"></label>';
                }
                ?>
            </div>
        </div>

        <div class="w-[300px] flex justify-between items-center bg-gray-800 rounded-md p-3 mt-10">
            <div class="text-[#e4e5f7] justify-between items-center text-xl">
                <span><span class="count">0</span> Tickets</span>
                <div class="amount">0</div>
            </div>
            <button type="button" id="bookingButton" class="bg-gray-600 text-white font-semibold py-2 px-4 rounded-md text-xl">Book Tickets</button>
        </div>
        <div class="mt-6">
            <a href="#" onclick="history.back();" class="bg-gray-600 text-white text-xl font-semibold py-4 px-10 rounded-md hover:text-gray-500">Back to Schedule</a>
        </div>
    </div>

    <script>
        let seats = document.querySelector(".grid");
        let tickets = seats.querySelectorAll("input");

        tickets.forEach((ticket) => {
            ticket.addEventListener("change", () => {
                let amount = document.querySelector(".amount").innerHTML;
                let count = document.querySelector(".count").innerHTML;
                amount = Number(amount);
                count = Number(count);

                let seatLabel = ticket.nextElementSibling;

                if (seatLabel.classList.contains('booked')) {
                    ticket.checked = false;
                    return;
                }

                if (ticket.checked) {
                    count += 1;
                    amount += 200; // Adjust price calculation as needed
                    seatLabel.classList.add('your-seat');
                    seatLabel.classList.remove('available');
                } else {
                    count -= 1;
                    amount -= 200; // Adjust price calculation as needed
                    seatLabel.classList.remove('your-seat');
                    seatLabel.classList.add('available');
                }
                document.querySelector(".amount").innerHTML = amount;
                document.querySelector(".count").innerHTML = count;
            });
        });

        document.getElementById("bookingButton").addEventListener("click", () => {
            let bookedSeats = Array.from(tickets).filter(ticket => ticket.checked);
            if (bookedSeats.length > 0) {
                let seatIds = bookedSeats.map(seat => seat.id.substring(1));
                let formData = new FormData();
                formData.append('action', 'bookSeats');
                formData.append('seatIds', JSON.stringify(seatIds));
                fetch('booking.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Booking Successful!");
                        location.reload();
                    } else {
                        alert("Booking Failed: " + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            } else {
                alert("Please select at least one seat to book.");
            }
        });
    </script>
</body>

</html>
