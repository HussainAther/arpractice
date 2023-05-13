const Scene = require('Scene');
const TouchGestures = require('TouchGestures');
const Reactive = require('Reactive');

// Find the bullet object in the scene
const bullet = Scene.root.find('bullet');

// Listen for touch events
TouchGestures.onTap().subscribe(function (gesture) {
  // Cast a ray from the touch point into the scene
  const raycast = Scene.raycaster(gesture.location, gesture.direction, 100);

  // Get the first hit object
  const hit = raycast.hitTestFirst();

  if (hit) {
    // Set the position of the bullet to the hit point
    bullet.transform.position = hit.hitPoint;

    // Make the bullet face upwards
    bullet.transform.lookAt(Reactive.point(hit.hitPoint.x, hit.hitPoint.y + 1, hit.hitPoint.z));

    // Destroy the bullet after a delay
    Scene.setTimeout(function() {
      bullet.transform.position = Reactive.point(0, -10, 0);
    }, 5000);
  }
});

