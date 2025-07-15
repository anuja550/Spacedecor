<?php
include 'db_config.php'; // Include database connection

$sql = "SELECT * FROM faqs_table";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Your existing FAQ CSS -->
</head>
<body>
    <div class="container">
        <h1>Frequently Asked Questions</h1>
        <input type="text" id="faqSearch" placeholder="Search FAQs...">

        <div id="faqContainer">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="faq-item">';
                    echo '<h3>' . $row["question"] . '</h3>';
                    echo '<p>' . $row["answer"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>No FAQs available.</p>";
            }
            ?>
        </div>

        <a href="contact.html" style="display:block; text-align:center; margin-top: 30px;">Contact Us</a>
    </div>

    <script>
        // Toggle FAQ Answer Visibility
        const faqItems = document.querySelectorAll('.faq-item h3');
        faqItems.forEach(item => {
            item.addEventListener('click', function () {
                this.nextElementSibling.classList.toggle('active');
            });
        });
    </script>
</body>
</html>

<?php $conn->close(); ?> <!-- Close connection -->
