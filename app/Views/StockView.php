<html>
<body>
<form action="/add" method="get">
    <label for="name">Search</label>
    <input type="text" id="name" name="name" required>
    <button type="submit">Refresh the values</button>
</form>
<table>


    <?php

    foreach ($stocks as $stock): ?>

        <?php ?>
       Name: <?php echo $stock->getName() ?><br>
    <p>
       Previous Close: <?php echo $stock->getClose() ?><br>
        Open: <?php echo $stock->getOpen() ?><br>
        Bid: <?php echo $stock->getBid() ?><br>
        Ask: <?php echo $stock->getAsk() ?><br>
        Days's Range: <?php echo $stock->getDayRange() ?><br>
        52 week Range: <?php echo $stock->getYearRate() ?><br>
        Volume: <?php echo $stock->getVolume() ?><br>
        Avg. Volume: <?php echo $stock->getAvgVolume() ?><br>
        Created at: <?php echo $stock->getCreatedAt(); ?><br>
    <?php endforeach; ?>
</table>
</body>
</html>

