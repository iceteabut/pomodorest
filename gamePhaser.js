var config = {
    type: Phaser.AUTO,
    width: 430,
    height: 270,
    parent: 'game3',
    transparent:true,
    physics: {
        default: 'arcade',
        arcade: {
            gravity: { y: 0 },
            debug: false
        }
    },
    scene: {
        preload: preload,
        create: create,
        update: update
    }
  };

var game3 = new Phaser.Game(config);
var player;
var desk1;
var desk2;
var desk3;
var desk4;
var desk5;
var desk6;
var coffee;
var water;
var plant;
var pillow;
var book;
var score = 0;
var scoreText;
var timeText;
var timeLimit = 5;
var timerEvent;
var message="";


function preload ()
{
  //this.load.image('background', 'assets/background.jpg');
  this.load.image('player', 'assets/player.png');
  this.load.image('desk1', 'assets/desk1.png');
  this.load.image('desk3', 'assets/desk1.png');
  this.load.image('desk5', 'assets/desk1.png');
  this.load.image('desk2', 'assets/desk2.png');
  this.load.image('desk4', 'assets/desk2.png');
  this.load.image('desk6', 'assets/desk2.png');
  this.load.image('coffee', 'assets/coffee.png');
  this.load.image('water', 'assets/water.png');
  this.load.image('plant', 'assets/plant.png');
  this.load.image('book', 'assets/book.png');
  this.load.image('pillow', 'assets/pillow.png');
}

function create ()
{
  //this.add.image(400, 300, 'background');
  var score = 0;
  var timeLimit = 5;

  desk1 = this.physics.add.staticImage(Phaser.Math.Between(300, 400), Phaser.Math.Between(20, 250), 'desk1');
  desk2 = this.physics.add.staticImage(Phaser.Math.Between(30, 400), Phaser.Math.Between(20, 250), 'desk2');
  desk3 = this.physics.add.staticImage(Phaser.Math.Between(30, 400), Phaser.Math.Between(20, 250), 'desk3');
  desk4 = this.physics.add.staticImage(Phaser.Math.Between(30, 400), Phaser.Math.Between(20, 250), 'desk4');
  desk5 = this.physics.add.staticImage(Phaser.Math.Between(30, 400), Phaser.Math.Between(20, 250), 'desk5');
  desk6 = this.physics.add.staticImage(Phaser.Math.Between(30, 400), Phaser.Math.Between(20, 250), 'desk6');
  coffee = this.physics.add.image(Phaser.Math.Between(30, 400), Phaser.Math.Between(20, 250), 'coffee').setInteractive({ cursor: 'pointer' });
  water = this.physics.add.image(Phaser.Math.Between(30, 400), Phaser.Math.Between(20, 250), 'water').setInteractive({ cursor: 'pointer' });
  plant = this.physics.add.image(Phaser.Math.Between(30, 400), Phaser.Math.Between(20, 250), 'plant').setInteractive({ cursor: 'pointer' });
  pillow = this.physics.add.image(Phaser.Math.Between(30, 400), Phaser.Math.Between(20, 250), 'pillow').setInteractive({ cursor: 'pointer' });
  book = this.physics.add.image(Phaser.Math.Between(30, 400), Phaser.Math.Between(20, 250), 'book').setInteractive({ cursor: 'pointer' });

  player = this.physics.add.sprite(50, 50, 'player');
  player.setCollideWorldBounds(true);

  scoreText = this.add.text(30, 15, 'Taškai: 0', { fontSize: '16px', fill: '#000' });
  timeText = this.add.text(340, 15, 'Laikas: ' + timeLimit, { fontSize: '16px', fill: '#000' });

  function showTextMessage(message) {
    var text = this.add.text('');
    text = this.add.text(220, 120, message, { font: "16px Arial", fill: "#00FF00", align: 'center', wordWrap: { width: 350 } });
    text.setOrigin(0.5);
    setTimeout(function() {
      text.destroy();
    }, 5000);
  }

  this.physics.add.collider(player, desk1);
  this.physics.add.collider(player, desk2);
  this.physics.add.collider(player, desk3);
  this.physics.add.collider(player, desk4);
  this.physics.add.collider(player, desk5);
  this.physics.add.collider(player, desk6);

  this.physics.add.overlap(player, coffee, function(){
    score += 10;
    scoreText.setText('Taškai: ' + score);
    showTextMessage.call(this,'Kavos pertraukėlė! Skirk kelias minutes atsipalaidavimui ir atsistatymui.');
    coffee.disableBody(true, true);
  }, null, this);

  this.physics.add.overlap(player, water, function(){
    score += 10;
    scoreText.setText('Taškai: ' + score);
    showTextMessage.call(this,'Nepamiršk gerti vandens! Vanduo padės padidinti produktyvumą ir energiją.');
    water.disableBody(true, true);
  }, null, this);

  this.physics.add.overlap(player, plant, function(){
      score += 10;
      scoreText.setText('Taškai: ' + score);
      showTextMessage.call(this,'Žaluma padeda pagerinti nuotaiką ir produktyvumą! Pasigrožėk gamta.');
      plant.disableBody(true, true);
  }, null, this);

  this.physics.add.overlap(player, book, function(){
      score += 20;
      scoreText.setText('Taškai: ' + score);
      showTextMessage.call(this,'Skirk laiko pažinimui! Skaitymas lavina kūrybiškumą, praplečia žinias.');
      book.disableBody(true, true);
  }, null, this);

  this.physics.add.overlap(player, pillow, function(){
    score += 20;
    scoreText.setText('Taškai: ' + score);
    showTextMessage.call(this,'Miegas - svarbi darbo dalis! Nepamiršk gerai pailsėti.');
    pillow.disableBody(true, true);
}, null, this);

  cursors = this.input.keyboard.createCursorKeys();

  timerEvent = this.time.addEvent({
      delay: 1000,
      callback: onLaikasrEvent,
      callbackScope: this,
      loop: true
  });
  function onLaikasrEvent() {
    timeLimit--;
    timeText.setText('Laikas: ' + timeLimit);
    if (timeLimit === 0) {
        this.physics.pause();
        player.setTint(0xff0000);
        var gameOverText = this.add.text(this.cameras.main.centerX, this.cameras.main.centerY, 'Laikas baigėsi:( Surinkti taškai: ' + score, { fontSize: '16px', fill: '#ff0000' }).setOrigin(0.5);
        setTimeout(function() {
            gameOverText.destroy();
        }, 3000);
        reloadGame();
        
    }
}

timerEvent.loop = true;
}
function update ()
{
  if (cursors.left.isDown)
  {
      player.setVelocityX(-130);
  }
  else if (cursors.right.isDown)
  {
      player.setVelocityX(130);
  }

  if (cursors.up.isDown)
  {
      player.setVelocityY(-130);
  }
  else if (cursors.down.isDown)
  {
      player.setVelocityY(130);
  }
}


function reloadGame() {
    // Destroy the current game instance
    game3.destroy(true);
    // Recreate the game instance
    game3 = new Phaser.Game(config);
  }




    function restart() {
        
        // Reset game state
        score = 0;
        timeLimit = 30;
        scoreText.setText('Taškai: ' + score);
        timeText.setText('Laikas: ' + timeLimit);
      
        // Reset player position
        player.setPosition(50, 50);
     
        // Remove all interactive objects from the scene
        coffee.destroy();
        water.destroy();
        plant.destroy();
        pillow.destroy(); 
        book.destroy();
        desk1.destroy();
        desk2.destroy();
        desk3.destroy();
        desk4.destroy();
        desk5.destroy();
        desk6.destroy();
       
        
        coffee = this.physics.add.image(Phaser.Math.Between(50, 350), Phaser.Math.Between(50, 350), 'coffee').setInteractive({ cursor: 'pointer' });
        water = this.physics.add.image(Phaser.Math.Between(50, 350), Phaser.Math.Between(50, 350), 'water').setInteractive({ cursor: 'pointer' });
        plant = this.physics.add.image(Phaser.Math.Between(50, 350), Phaser.Math.Between(50, 350), 'plant').setInteractive({ cursor: 'pointer' });
        pillow = this.physics.add.image(Phaser.Math.Between(50, 350), Phaser.Math.Between(50, 350), 'pillow').setInteractive({ cursor: 'pointer' });
        book = this.physics.add.image(Phaser.Math.Between(50, 350), Phaser.Math.Between(50, 350), 'book').setInteractive({ cursor: 'pointer' });
      
        // Resume physics and clear player tint
        this.physics.resume();
        player.clearTint();
      }
      
      // Call restart function on game over
      function onLaikasrEvent() {
        timeLimit--;
        timeText.setText('Laikas: ' + timeLimit);
        if (timeLimit === 0) {
            this.physics.pause();
            player.setTint(0xff0000);
            var gameOverText = this.add.text(this.cameras.main.centerX, this.cameras.main.centerY, 'Laikas baigėsi:( Surinkti taškai: ' + score, { fontSize: '16px', fill: '#ff0000' }).setOrigin(0.5);
            setTimeout(function() {
                gameOverText.destroy();
            }, 3000);
            restart();
        }
      }

