<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ticket Booking</title>
    <?php 
        include "config/config.php";
    ?>
    <style>x
        .seat {
            transition: background-color 0.3s ease;
        }
        .seat.booked {
            cursor: not-allowed;
            pointer-events: none;
        }
        .grid-cols-10 > *:nth-child(5n+6) {
            margin-left: 20px;
        }
    </style>    
</head>

<body class="h-screen flex items-center justify-center" style="background-color: #060614">
    <div class="w-full h-full rounded-xl shadow-2xl p-5 overflow-auto">
        <div class="flex flex-col items-center">
            <div class="text-center mb-20 mt-20">
                <div class="text-3xl font-bold uppercase" style="color: #9398e0;">Nama Film</div>
            </div>
            <!-- status -->
            <div class="w-full flex flex-col items-center mb-8 relative">
                <div class="w-full flex justify-evenly mb-6">
                    <div class="text-white text-lg flex items-center">
                        <div class="w-[20px] h-[20px] bg-green-500 rounded-sm mr-1"></div>
                        Available
                    </div>
                    <div class="text-white text-lg flex items-center">
                        <div class="w-[20px] h-[20px] bg-blue-500 rounded-sm mr-1"></div>
                        On Booking
                    </div>
                    <div class="text-white text-lg flex items-center">
                        <div class="w-[20px] h-[20px] bg-yellow-500 rounded-sm mr-1"></div>
                        Your Seats
                    </div>
                    <div class="text-white text-lg flex items-center">
                        <div class="w-[20px] h-[20px] bg-red-600 rounded-sm mr-1"></div>
                        Sold
                    </div>
                </div>
                <!-- seats -->
                <div class="grid grid-cols-10 gap-6 mt-20 mb-8">
                    <input type="checkbox" name="tickets" id="s1" class="hidden" />
                    <label for="s1" class="seat booked w-[30px] h-[30px] rounded-sm border border-gray-400 cursor-pointer"></label>
                </div>
                <!-- screen -->
                <div>
                    <p class="text-white text-lg text-center mb-6 uppercase">screen</p>
                    <div class="w-[900px] h-1.5 bg-blue-300 rounded-b-sm border-t border-gray-400 absolute bottom-0 left-1/2 transform -translate-x-1/2"></div>
                </div>
            </div>
            <!-- button boo -->
            <div class="w-[300px] flex justify-between items-center bg-gray-800 rounded-md p-3 mt-10">
                <div class="text-[#e4e5f7] justify-between items-center text-xl">
                    <span><span class="count">0</span> Tickets</span>
                    <div class="amount">0</div>
                </div>
                <button type="button" id="bookingButton" class="bg-gray-600 text-white font-semibold py-2 px-4 rounded-md text-xl">Booking</button>
            </div>
            <div class="mt-6">
                <button type="button" id="cancelButton" class="bg-gray-600 text-white text-xl font-semibold py-4 px-10 rounded-md hover:text-gray-500">cancel</button>
            </div>
        </div>
    </div>

    <script>
        let seats = document.querySelector(".grid");
        for (var i = 0; i < 59; i++) {
            let randint = Math.floor(Math.random() * 2);
            let booked = randint === 1 ? "booked" : "bg-blue-600";
            seats.insertAdjacentHTML(
                "beforeend",
                '<input type="checkbox" name="tickets" id="s' +
                (i + 2) +
                '" class="hidden" /><label for="s' +
                (i + 2) +
                '" class="seat ' + booked +
                ' w-[30px] h-[30px] rounded-sm border border-gray-400 cursor-pointer"></label>'
            );
        }

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
            amount += 200;
            seatLabel.classList.add('bg-blue-500');
            seatLabel.classList.remove('bg-gray-400');
        } else {
            count -= 1;
            amount -= 200;
            seatLabel.classList.remove('bg-blue-500');
            seatLabel.classList.add('bg-gray-400');
        }
        document.querySelector(".amount").innerHTML = amount;
        document.querySelector(".count").innerHTML = count;
    });
});

        document.getElementById("bookingButton").addEventListener("click", () => {
            let bookedSeats = Array.from(tickets).filter(ticket => ticket.checked);
            if (bookedSeats.length > 0) {
                alert("Booking Successful!");
            } else {
                alert("Please select at least one seat to book.");
            }
        });
    </script>
</body>

</html>