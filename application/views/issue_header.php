<div id="issue-header">
    <?php foreach ($issue as $x): ?>
        <h4><?php  echo $x->name ?></h4>
    <p><?php echo $x->description ?></p>
    <?php endforeach ?>
</div>