const Scene = require('Scene');
const Diagnostics = require('Diagnostics');

// Get references to the object to track and the camera
const objectToTrack = Scene.root.find('objectToTrack');
const camera = Scene.root.find('Camera');

// Define the tracking distance and speed
const trackingDistance = 0.5; // distance in meters
const trackingSpeed = 0.5; // speed in meters per second

// Start tracking the object in the update loop
Time.ms.interval(16).subscribe(() => {
  // Calculate the position and rotation of the camera
  const cameraPosition = camera.worldTransform.position;
  const cameraRotation = camera.worldTransform.rotation;

  // Calculate the position of the object to track relative to the camera
  const objectPositionRelativeToCamera = Scene.unprojectWithDepth(
    objectToTrack.worldTransform.position,
    camera.focalPlane.distance
  );

  // Calculate the vector from the camera to the object
  const cameraToObjectVector = objectPositionRelativeToCamera.sub(cameraPosition);

  // Calculate the distance from the camera to the object
  const cameraToObjectDistance = cameraToObjectVector.length();

  // If the object is within tracking distance, move towards it
  if (cameraToObjectDistance > trackingDistance) {
    // Calculate the direction to the object
    const directionToObject = cameraToObjectVector.normalize();

    // Move the camera in the direction of the object at the tracking speed
    camera.transform.position = cameraPosition.add(directionToObject.mul(trackingSpeed));
  } else {
    // The object is within tracking distance
    Diagnostics.log('Object found!');
  }
});

