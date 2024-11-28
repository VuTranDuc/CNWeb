<?php
// Nhận dữ liệu câu trả lời từ form
$answers = $_POST;

// Đọc tệp Quiz.txt
$filename = "Quiz.txt";
$questions = [];

if (file_exists($filename)) {
    $content = file_get_contents($filename);
    $lines = explode("\n", $content);

    $currentQuestion = null;

    foreach ($lines as $line) {
        $line = trim($line);

        if (!empty($line) && strpos($line, "ANSWER:") === false) {
            if (!$currentQuestion) {
                $currentQuestion = ['question' => $line, 'answers' => []];
            } else {
                $currentQuestion['answers'][] = $line;
            }
        }

        if (strpos($line, "ANSWER:") !== false) {
            $currentQuestion['correct'] = str_replace("ANSWER: ", "", $line);
            $questions[] = $currentQuestion;
            $currentQuestion = null;
        }
    }
} else {
    echo "Tệp $filename không tồn tại.";
    exit;
}

// Chấm điểm
$score = 0;

foreach ($questions as $index => $q) {
    $userAnswer = isset($answers["q$index"]) ? $answers["q$index"] : null;

    if ($userAnswer === $q['correct']) {
        $score++;
    }
}

// Hiển thị kết quả
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả bài thi</title>
</head>
<body>
    <h1>Kết quả của bạn</h1>
    <p>Số câu trả lời đúng: <?= $score ?> / <?= count($questions) ?></p>
    <a href="quiz.php">Làm lại bài thi</a>
</body>
</html>
