<?= $this->Form->create(null ,[
    'path'=>['controller' => 'Ais' , 'action' => 'generate']
]) ?>
<input type="text" name="prompt" placeholder="Enter your prompt" required>
<button type="submit">Generate</button>
<?= $this->Form->end() ?>