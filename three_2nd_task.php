<!DOCTYPE html>
<html>
<body>

<?php
$students = [
    ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'track' => 'PHP'],
    ['name' => 'Shamy', 'email' => 'ali@test.com', 'track' => 'CMS'],
    ['name' => 'Youssef', 'email' => 'basem@test.com', 'track' => 'PHP'],
    ['name' => 'Waleid', 'email' => 'farouk@test.com', 'track' => 'CMS'],
    ['name' => 'Rahma', 'email' => 'hany@test.com', 'track' => 'PHP'],
];
?>

<h2>Student Information</h2>
<table border="01"  >
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Track</th>
    </tr>
    <?php foreach ($students as $student): ?>
        <tr style="color: <?php echo $student['track'] === 'CMS' ? 'red' : 'black'; ?>">
            <td><?php echo htmlspecialchars($student['name']); ?></td>
            <td><?php echo htmlspecialchars($student['email']); ?></td>
            <td><?php echo htmlspecialchars($student['track']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
