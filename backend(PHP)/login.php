<?php
session_start();
include("db.php");
global $conn;

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: plant.php");
            exit();
        } else { $error = "Wrong password"; }
    } else { $error = "User not found"; }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leafora | Premium Digital Forest</title>

    <!-- Font: Playfair Display -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root { --primary-glow: #00ff88; --bg-dark: #010503; }
        
        body, html { 
            margin: 0; padding: 0; width: 100%; height: 100%; 
            overflow: hidden; background: var(--bg-dark); 
            font-family: 'Playfair Display', serif; 
        }

        #canvas-container { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; }
        .vignette { position: fixed; inset: 0; background: radial-gradient(circle at center, transparent 0%, rgba(0,0,0,0.8) 100%); z-index: 2; pointer-events: none; }

        .ui-wrapper {
            position: fixed;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            pointer-events: none;
        }

        .login-card-container {
            width: 100%;
            max-width: 440px;
            padding: 20px;
            pointer-events: all;
            opacity: 0;
            transform: translateY(30px);
            visibility: hidden;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(35px) saturate(180%);
            -webkit-backdrop-filter: blur(35px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 40px;
            padding: 50px 40px;
            box-shadow: 0 50px 100px rgba(0,0,0,0.5);
            text-align: center;
        }

        .brand-title { 
            font-family: 'Playfair Display', serif;
            font-weight: 900; 
            font-size: 2.6rem; 
            color: #a8edb4a0;
            letter-spacing: 9px; 
            margin-bottom: 6px; 
            text-transform: uppercase;
            text-shadow: 0 0 40px rgba(0, 255, 136, 0.25);
        }

        .brand-tagline { 
            font-family: 'Playfair Display', serif;
            color: var(--primary-glow); 
            font-weight: 400; 
            font-style: italic;
            letter-spacing: 3px; 
            font-size: 0.85rem; 
            margin-bottom: 42px;
        }

        .form-label-hint {
            font-family: 'Playfair Display', serif;
            font-size: 0.65rem;
            letter-spacing: 3px;
            color: rgba(255,255,255,0.3);
            text-align: left;
            display: block;
            margin-bottom: 6px;
            margin-left: 4px;
            text-transform: uppercase;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 18px; 
            padding: 15px 20px; 
            color: white !important; 
            margin-bottom: 20px;
            font-family: 'Playfair Display', serif;
            font-size: 0.9rem;
            letter-spacing: 1px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: rgba(0, 255, 136, 0.4) !important;
            box-shadow: 0 0 20px rgba(0, 255, 136, 0.1) !important;
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.25);
            letter-spacing: 2px;
            font-size: 0.75rem;
        }

        .btn-glow {
            width: 100%; padding: 18px; border-radius: 18px; border: none;
            background: #a8edb4a0; color: #0c2f04; 
            font-family: 'Playfair Display';
            font-weight: 900; 
            font-size: 1.2rem; 
            letter-spacing: 4px;
            transition: 0.4s ease;
            text-shadow: 0 0 40px rgba(0, 255, 136, 0.25);
        }

        .btn-glow:hover { 
            background: var(--primary-glow); 
            transform: translateY(-5px); 
            box-shadow: 0 20px 40px rgba(0, 255, 136, 0.3); 
        }
        
        .error-box { 
            background: rgba(255, 50, 50, 0.1); 
            color: #ff9999; 
            padding: 12px 16px; 
            border-radius: 12px; 
            font-size: 0.78rem; 
            margin-bottom: 20px; 
            border: 1px solid rgba(255,0,0,0.2);
            font-family: 'Playfair Display', serif;
            letter-spacing: 1px;
        }

        .register-link {
            color: rgba(255,255,255,0.35); 
            text-decoration: none; 
            font-size: 0.75rem;
            display: block; 
            margin-top: 28px; 
            letter-spacing: 2px;
            font-family: 'Playfair Display';
            transition: color 0.3s;
        }

        .register-link:hover {
            color: var(--primary-glow);
        }
    </style>
</head>
<body>

    <div class="vignette"></div>
    <div id="canvas-container"></div>

    <div class="ui-wrapper">
        <div class="login-card-container" id="loginUI">
            <div class="glass-card">
                <div class="brand-title">Leafora</div>
                <div class="brand-tagline">Welcome Back</div>

                <?php if(isset($error)): ?>
                    <div class="error-box"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <form method="POST">
                    <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <button type="submit" class="btn-glow">LOGIN</button>
                </form>
                
                <a href="register.php" class="register-link">Create New Account</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <script>
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('canvas-container').appendChild(renderer.domElement);

        const particleCount = 15000;
        const geometry = new THREE.BufferGeometry();
        const positions = new Float32Array(particleCount * 3);
        const targetPositions = new Float32Array(particleCount * 3); 
        const colors = new Float32Array(particleCount * 3);

        for (let i = 0; i < particleCount; i++) {
            const y = (Math.random() * 15 - 5);
            const radius = Math.max(0, 5 - (y * 0.5)) * Math.random();
            const theta = Math.random() * Math.PI * 2;
            positions[i * 3] = Math.cos(theta) * radius;
            positions[i * 3 + 1] = y;
            positions[i * 3 + 2] = Math.sin(theta) * radius;

            targetPositions[i * 3] = (Math.random() - 0.5) * 45;
            targetPositions[i * 3 + 1] = (Math.random() - 0.5) * 30;
            targetPositions[i * 3 + 2] = (Math.random() - 0.5) * 20;

            colors[i * 3] = 0; 
            colors[i * 3 + 1] = Math.random() * 0.6 + 0.4;
            colors[i * 3 + 2] = Math.random() * 0.3;
        }

        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

        const material = new THREE.PointsMaterial({
            size: 0.035,
            vertexColors: true,
            transparent: true,
            opacity: 0.8,
            blending: THREE.AdditiveBlending
        });

        const particleSystem = new THREE.Points(geometry, material);
        scene.add(particleSystem);
        camera.position.z = 15;

        const tl = gsap.timeline();
        tl.from(particleSystem.scale, { x: 0, y: 0, z: 0, duration: 1.5, ease: "expo.out" });
        tl.from(particleSystem.rotation, { y: 2.5, duration: 2 }, 0);
        tl.to(positions, {
            endArray: targetPositions, 
            duration: 3, 
            ease: "expo.inOut",
            onUpdate: () => { geometry.attributes.position.needsUpdate = true; }
        }, 1.2);
        tl.to("#loginUI", { 
            autoAlpha: 1, 
            y: 0, 
            duration: 1.5, 
            ease: "power4.out" 
        }, 1.8);

        let mouseX = 0, mouseY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX - window.innerWidth / 2) * 0.0003;
            mouseY = (e.clientY - window.innerHeight / 2) * 0.0003;
        });

        function animate() {
            requestAnimationFrame(animate);
            particleSystem.rotation.y += 0.001;
            particleSystem.rotation.x += (mouseY - particleSystem.rotation.x) * 0.05;
            particleSystem.rotation.z += (mouseX - particleSystem.rotation.z) * 0.05;
            renderer.render(scene, camera);
        }
        animate();

        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    </script>
</body>
</html>