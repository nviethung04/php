<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Trắc Nghiệm</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bài Trắc Nghiệm</h1>

        <?php
        // Đọc file câu hỏi
        $filename = "questions.txt";
        if (!file_exists($filename)) {
            echo "<div class='alert alert-danger text-center'>Tệp câu hỏi không tồn tại.</div>";
            exit();
        }

        $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $parsed_questions = [];
        $current_question = [];

        foreach ($questions as $line) {
            if (strpos($line, "Câu") === 0) {
                if (!empty($current_question)) {
                    $parsed_questions[] = $current_question;
                }
                $current_question = [];
            }
            $current_question[] = $line;
        }
        if (!empty($current_question)) {
            $parsed_questions[] = $current_question;
        }

        // Hiển thị câu hỏi
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Xử lý kết quả bài làm
            $answers = [];
            foreach ($questions as $line) {
                if (strpos($line, "ANSWER:") !== false) {
                    $answers[] = trim(substr($line, strpos($line, ":") + 1));
                }
            }

            $score = 0;
            foreach ($_POST as $key => $userAnswer) {
                $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
                if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
                    $score++;
                }
            }

            // Hiển thị kết quả
            echo "<div class='alert alert-success text-center'>";
            echo "Bạn trả lời đúng <strong>$score</strong>/" . count($answers) . " câu.";
            echo "</div>";
            echo "<a href='Bai2.php' class='btn btn-primary'>Làm lại</a>";
        } else {
            // Hiển thị giao diện câu hỏi
            echo "<form method='POST' action=''>";
            $question_number = 1;
            foreach ($parsed_questions as $question) {
                echo "<div class='card mb-4'>";
                echo "<div class='card-header'><strong>{$question[0]}</strong></div>";
                echo "<div class='card-body'>";
                for ($i = 1; $i <= 4; $i++) {
                    $answer = substr($question[$i], 0, 1); // A, B, C, D
                    echo "<div class='form-check'>";
                    echo "<input class='form-check-input' type='radio' name='question{$question_number}' value='{$answer}' id='question{$question_number}{$answer}'>";
                    echo "<label class='form-check-label' for='question{$question_number}{$answer}'>{$question[$i]}</label>";
                    echo "</div>";
                }
                echo "</div>";
                echo "</div>";
                $question_number++;
            }
            echo "<button type='submit' class='btn btn-primary'>Nộp bài</button>";
            echo "</form>";
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
