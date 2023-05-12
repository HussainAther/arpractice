const Scene = require('Scene');
const Reactive = require('Reactive');

// Get the animated object from the scene
const animatedObject = Scene.root.find('animatedObject');

// Define the rotation speed and angle
const rotationSpeed = 0.1;
var angle = 0;

// Create a time driver to control the rotation animation
const timeDriver = Animation.timeDriver({ durationMilliseconds: 10000, loopCount: Infinity });
const timeSampler = Animation.samplers.linear(0, 1);
const rotationAnimation = Animation.animate(timeDriver, timeSampler);

// Start the time driver
timeDriver.start();

// Rotate the object in the update loop
Time.ms.interval(16).subscribe(() => {
  angle += rotationSpeed;
  animatedObject.transform.rotationY = Reactive.wrap(angle);
});

