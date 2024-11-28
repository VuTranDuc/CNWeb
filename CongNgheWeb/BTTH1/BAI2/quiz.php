<?php
// Đọc tệp Quiz.txt
$filename = "Quiz.txt"; // Đường dẫn tới tệp văn bản
$questions = [];

// Kiểm tra xem tệp có tồn tại không
if (file_exists($filename)) {
    $content = file_get_contents($filename);
    $lines = explode("\n", $content);

    $currentQuestion = null;

    foreach ($lines as $line) {
        $line = trim($line);

        // Bắt đầu một câu hỏi mới
        if (!empty($line) && strpos($line, "ANSWER:") === false) {
            if (!$currentQuestion) {
                $currentQuestion = ['question' => $line, 'answers' => []];
            } else {
                $currentQuestion['answers'][] = $line;
            }
        }

        // Thêm câu trả lời
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
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .question {
            margin-bottom: 20px;
        }
        .question h3 {
            margin: 0 0 10px 0;
        }
        .answers {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <h1>Bài thi trắc nghiệm</h1>
    <form method="POST" action="result.php">
        <?php foreach ($questions as $index => $q): ?>
            <div class="question">
                <h3>Câu <?= $index + 1 ?>: <?= $q['question'] ?></h3>
                <div class="answers">
                    <?php foreach ($q['answers'] as $answer): ?>
                        <label>
                            <input type="radio" name="q<?= $index ?>" value="<?= substr($answer, 0, 1) ?>">
                            <?= $answer ?>
                        </label><br>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <button type="submit">Nộp bài</button>
    </form>
</body>
</html>
