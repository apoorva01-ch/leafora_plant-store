<?php 
include("db.php");
session_start();

global $conn;
if (
    isset($_POST['name']) && isset($_POST['email']) &&
    isset($_POST['password'])
) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $reg_error = "Account already exists with this email.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);
        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            $reg_error = "Error registering. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Leafora | Join the Forest</title>

    <!-- Font: Playfair Display -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            /* Same green theme as login */
            --accent: #00ff88;
            --bg-dark: #010503;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body, html {
            width: 100%; height: 100%;
            overflow: hidden;
            background: var(--bg-dark);
            font-family: 'Playfair Display', serif;
        }

        #canvas-container { position: fixed; inset: 0; z-index: 1; }

        /* Radial vignette matching login's dark green bg */
        .vignette {
            position: fixed; inset: 0; z-index: 2; pointer-events: none;
            background: radial-gradient(ellipse 60% 60% at 50% 50%, transparent 0%, rgba(1,5,3,0.85) 100%);
        }

        .ui-wrapper {
            position: fixed; inset: 0;
            display: flex; align-items: center; justify-content: center;
            z-index: 10; pointer-events: none;
        }

        .register-card-container {
            width: 100%; max-width: 440px;
            padding: 20px; pointer-events: all;
            opacity: 0; transform: scale(0.92);
            visibility: hidden;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(40px) saturate(200%);
            -webkit-backdrop-filter: blur(40px) saturate(200%);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 40px;
            padding: 50px 40px;
            box-shadow:
                0 0 0 1px rgba(0,255,136,0.05),
                0 50px 100px rgba(0,0,0,0.6),
                0 0 80px rgba(0, 255, 136, 0.04) inset;
            text-align: center;
        }

        .brand-title {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 2.6rem;
            color: #a8edb4a0;
            letter-spacing: 9px;
            text-transform: uppercase;
            margin-bottom: 6px;
            text-shadow: 0 0 40px rgba(0, 255, 136, 0.25);
        }

        .brand-tagline {
            font-family: 'Playfair Display', serif;
            color: var(--accent);
            font-weight: 400;
            font-style: italic;
            letter-spacing: 3px;
            font-size: 0.85rem;
            margin-bottom: 42px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 18px;
            padding: 15px 20px;
            color: white !important;
            margin-bottom: 18px;
            font-family: 'Playfair Display', serif;
            font-size: 0.9rem;
            letter-spacing: 1px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: rgba(0, 255, 136, 0.45) !important;
            box-shadow: 0 0 20px rgba(0, 255, 136, 0.12) !important;
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.22);
            letter-spacing: 2px;
            font-size: 0.75rem;
        }

        .btn-register {
            width: 100%; padding: 18px; border-radius: 18px; border: none;
            background: #a8edb4a0;
            color: #0c2f04; 
            font-family: 'Playfair Display';
            font-weight: 900;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            transition: 0.4s ease;
            cursor: pointer;
             text-shadow: 0 0 40px rgba(0, 255, 136, 0.25);
        }

        .btn-register:hover {
            background: var(--accent);
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 255, 136, 0.3);
        }

        .error-box {
            background: rgba(255, 100, 100, 0.08);
            color: #ffaaaa;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.78rem;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 100, 100, 0.18);
            font-family: 'Playfair Display', serif;
            letter-spacing: 1px;
        }

        .login-link {
            color: rgba(255,255,255,0.3);
            text-decoration: none;
            font-size: 0.75rem;
            display: block;
            margin-top: 28px;
            letter-spacing: 2px;
            font-family: 'Playfair Display', serif;
            
            transition: color 0.3s;
        }

        .login-link:hover { color: var(--accent); }

        @media (max-width: 480px) {
            .glass-card { padding: 36px 24px; border-radius: 28px; }
            .brand-title { font-size: 2rem; letter-spacing: 8px; }
            body { overflow-y: auto; }
        }
    </style>
</head>
<body>

<div class="vignette"></div>
<div id="canvas-container"></div>

<div class="ui-wrapper">
    <div class="register-card-container" id="registerUI">
        <div class="glass-card">
            <div class="brand-title">Leafora</div>
            <div class="brand-tagline">Begin Your Journey</div>

            <?php if(isset($reg_error)): ?>
                <div class="error-box"><?= htmlspecialchars($reg_error) ?></div>
            <?php endif; ?>

            <form method="POST" action="register.php">
                <input type="text"     name="name"     class="form-control" placeholder="Full Name"       required>
                <input type="email"    name="email"    class="form-control" placeholder="Email Address"   required>
                <input type="password" name="password" class="form-control" placeholder="Password"        required>
                <button type="submit" class="btn-register">Create Account</button>
            </form>

            <a href="login.php" class="login-link">Already have an account? Login</a>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<script>
// ─── SCENE SETUP ────────────────────────────────────────────
const scene    = new THREE.Scene();
const camera   = new THREE.PerspectiveCamera(70, innerWidth / innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
renderer.setSize(innerWidth, innerHeight);
renderer.setPixelRatio(Math.min(devicePixelRatio, 2));
document.getElementById('canvas-container').appendChild(renderer.domElement);
camera.position.z = 18;

// ─── PARTICLE SYSTEM ────────────────────────────────────────
const COUNT = 14000;
const geo   = new THREE.BufferGeometry();

const initPos   = new Float32Array(COUNT * 3); // start: random cloud far out
const vortexPos = new Float32Array(COUNT * 3); // phase 1: galaxy spiral disk
const floatPos  = new Float32Array(COUNT * 3); // phase 2: dissolve outward
const colors    = new Float32Array(COUNT * 3);

for (let i = 0; i < COUNT; i++) {
    const i3 = i * 3;

    // INIT — random outer cloud
    const phi   = Math.random() * Math.PI * 2;
    const rInit = 18 + Math.random() * 20;
    initPos[i3]     = Math.cos(phi) * rInit;
    initPos[i3 + 1] = (Math.random() - 0.5) * 24;
    initPos[i3 + 2] = Math.sin(phi) * rInit;

    // VORTEX TARGET — flat logarithmic spiral (galaxy disk)
    const arm       = Math.floor(Math.random() * 3); // 3 spiral arms
    const t         = Math.random();                  // 0→1 along arm
    const armAngle  = (arm / 3) * Math.PI * 2;
    const spiralR   = 1.2 + t * 9;
    const spiralAng = armAngle + t * 4.5 + (Math.random() - 0.5) * 0.6;
    const thickness = (1 - t) * 0.8;                 // arms thinner outward
    vortexPos[i3]     = Math.cos(spiralAng) * spiralR + (Math.random() - 0.5) * thickness;
    vortexPos[i3 + 1] = (Math.random() - 0.5) * 0.6; // almost flat disk
    vortexPos[i3 + 2] = Math.sin(spiralAng) * spiralR + (Math.random() - 0.5) * thickness;

    // FLOAT — slow drift after card appears
    floatPos[i3]     = vortexPos[i3]     + (Math.random() - 0.5) * 2;
    floatPos[i3 + 1] = vortexPos[i3 + 1] + (Math.random() - 0.5) * 1.5;
    floatPos[i3 + 2] = vortexPos[i3 + 2] + (Math.random() - 0.5) * 2;

    // COLOR — green core → lighter green tips (same family as login)
    const mix = t;
    colors[i3]     = 0;                                  // R: always 0
    colors[i3 + 1] = 0.5 + mix * 0.4;                   // G: 0.5→0.9
    colors[i3 + 2] = (1 - mix) * 0.25;                  // B: slight teal tint at core only
}

// Start positions at initPos
const posAttr = new THREE.BufferAttribute(initPos.slice(), 3);
geo.setAttribute('position', posAttr);
geo.setAttribute('color',    new THREE.BufferAttribute(colors, 3));

const mat = new THREE.PointsMaterial({
    size: 0.04,
    vertexColors: true,
    transparent: true,
    opacity: 0,
    blending: THREE.AdditiveBlending,
    depthWrite: false
});

const particles = new THREE.Points(geo, mat);
scene.add(particles);

// ─── CINEMATIC SEQUENCE ─────────────────────────────────────
const tl = gsap.timeline({ defaults: { ease: "power2.inOut" } });

// 1. Fade in particles from outer cloud
tl.to(mat, { opacity: 0.85, duration: 1.2, ease: "power1.in" });

// 2. Spiral inward → vortex disk (long, hypnotic pull)
tl.to(posAttr.array, {
    endArray: vortexPos,
    duration: 3.5,
    ease: "expo.inOut",
    onUpdate: () => { geo.attributes.position.needsUpdate = true; }
}, 0.4);

// 3. Tilt camera slightly to show disk from angle (dramatic)
tl.to(camera.rotation, { x: 0.45, duration: 2, ease: "power2.out" }, 1.0);

// 4. Card rise — scale from center, like emerging from the vortex eye
tl.to("#registerUI", {
    autoAlpha: 1,
    scale: 1,
    duration: 1.4,
    ease: "back.out(1.4)"
}, 2.6);

// 5. Subtle drift after reveal
tl.to(posAttr.array, {
    endArray: floatPos,
    duration: 6,
    ease: "sine.inOut",
    onUpdate: () => { geo.attributes.position.needsUpdate = true; }
}, 3.8);

// ─── CONTINUOUS ANIMATION ───────────────────────────────────
let mouseX = 0, mouseY = 0;
document.addEventListener('mousemove', e => {
    mouseX = (e.clientX / innerWidth  - 0.5) * 0.0004;
    mouseY = (e.clientY / innerHeight - 0.5) * 0.0004;
});

const clock = new THREE.Clock();

function animate() {
    requestAnimationFrame(animate);
    const t = clock.getElapsedTime();

    // Constant slow galaxy rotation on Y, gentle bob on X
    particles.rotation.y += 0.0012 + mouseX;
    particles.rotation.x += (mouseY - particles.rotation.x * 0.05) * 0.03;

    // Very subtle size breathing
    mat.size = 0.04 + Math.sin(t * 0.8) * 0.005;

    renderer.render(scene, camera);
}
animate();

// ─── RESIZE ─────────────────────────────────────────────────
window.addEventListener('resize', () => {
    camera.aspect = innerWidth / innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(innerWidth, innerHeight);
});
</script>
</body>
</html>