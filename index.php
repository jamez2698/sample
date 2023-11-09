<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Lightbox</title>
    <style>
        .image-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0; /* Initially hidden */
            transition: opacity 0.5s; /* Add a transition for opacity */
        }

        .image-popup.active {
            opacity: 1; /* When the "active" class is added, it becomes visible with a fade-in effect */
        }

        .popup-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .popup-content {
            max-width: 100%;
            max-height: 100%;
            display: block;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 25px;
            cursor: pointer;
            color: #555;
        }

        /* Square image container */
        .image-container {
            width: 200px; /* Set your desired square size here */
            height: 200px; /* Set your desired square size here */
            overflow: hidden;
        }

        .square-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="image-container">
        <img src="https://content.wepik.com/media/bg-remover/remove-bg-bg4.png" alt="Project 1" class="square-image" id="project-image1">
    </div>

    <div class="image-container">
        <img src="https://i.ytimg.com/vi/XeRyiN8qSKg/maxresdefault.jpg" alt="Project 2" class="square-image" id="project-image2">
    </div>

    <!-- Add more image containers as needed -->

    <div class="image-popup" id="popup">
        <div class="popup-box">
            <span class="close" id="close">&times;</span>
            <img class="popup-content" id="popup-image" src="">
        </div>
    </div>

    <script>
        const imageContainers = document.querySelectorAll(".image-container");
        const popup = document.getElementById("popup");
        const popupImage = document.getElementById("popup-image");
        const close = document.getElementById("close");

        imageContainers.forEach((container) => {
            const image = container.querySelector(".square-image");

            image.addEventListener("click", function() {
                popup.style.display = "flex";
                popupImage.src = image.src;

                // Add the "active" class to the popup and popup box to trigger the fade-in effect
                popup.classList.add("active");
            });

            close.addEventListener("click", function() {
                // Remove the "active" class to trigger the fade-out effect
                popup.classList.remove("active");

                // Set a timeout to hide the popup after the fade-out animation
                setTimeout(() => {
                    popup.style.display = "none";
                }, 500); // Adjust the timeout to match the transition duration
            });

            window.addEventListener("click", function(event) {
                if (event.target === popup) {
                    close.click(); // Close the popup if clicking outside the popup box
                }
            });
        });
    </script>
</body>
</html>
