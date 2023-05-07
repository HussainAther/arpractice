// Define a variable to store the AR.js context
let arContext = null;

// Define a function to initialize the AR.js context
function initAR() {
  // Create a new AR.js context
  arContext = new THREEx.ArToolkitContext({
    debug: false,
    cameraParametersUrl: "data/camera_para.dat",
    detectionMode: "mono",
  });

  // Initialize the AR.js context
  arContext.init(() => {
    // Create a new AR.js marker detector
    let markerControls = new THREEx.ArMarkerControls(arContext, camera, {
      type: "pattern",
      patternUrl: "data/patt.hiro",
    });

    // Create a new THREE.js scene
    let scene = new THREE.Scene();

    // Add a cube to the scene
    let cubeGeometry = new THREE.BoxGeometry(1, 1, 1);
    let cubeMaterial = new THREE.MeshNormalMaterial();
    let cube = new THREE.Mesh(cubeGeometry, cubeMaterial);
    scene.add(cube);

    // Define an animation loop
    function animate() {
      // Update the AR.js context
      arContext.update(camera);

      // Render the scene
      renderer.render(scene, camera);

      // Request the next animation frame
      requestAnimationFrame(animate);
    }

    // Start the animation loop
    animate();
  });
}

// Call the initAR function when the window loads
window.addEventListener("load", initAR);
