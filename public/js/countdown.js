let countdownDate;

window.addEventListener('load', startCountdown);

    function startCountdown() {
      // Get the date and time
      let dateString = new Date("2024-04-30T00:00:00Z");
      countdownDate = dateString.getTime();
 
      // Update the countdown every 1 second
      let x = setInterval(function() {
        // Get the current date and time
        let now = new Date().getTime();
         
        // Calculate the distance between now and the countdown date
        let distance = countdownDate - now;
         
        // Calculate days, hours, minutes and seconds
        let days = Math.floor(distance / (1000 * 60 * 60 * 24));
        let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);
         
        // Display the result
        document.getElementById("days").innerHTML = days.
            toString().padStart(2, '0');
        document.getElementById("hours").innerHTML = hours.
            toString().padStart(2, '0');
        document.getElementById("minutes").innerHTML = minutes.
            toString().padStart(2, '0');
        document.getElementById("seconds").innerHTML = seconds.
            toString().padStart(2, '0');
         
      }, 1000);
    }


      
