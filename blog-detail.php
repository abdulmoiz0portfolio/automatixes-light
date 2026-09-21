<?php 
$page_key = 'blog-detail'; 

// 1. Get and sanitize the blog ID or slug
$id = '';
if (!empty($_GET['slug'])) {
    $id = preg_replace('/[^a-zA-Z0-9\-]/', '', $_GET['slug']);
} elseif (!empty($_GET['id'])) {
    $id = preg_replace('/[^a-zA-Z0-9\-]/', '', $_GET['id']);
}
$file_path = __DIR__ . "/content/articles/{$id}.md";

// 2. Validate file exists
if (empty($id) || !file_exists($file_path)) {
    include 'header.php';
    echo '<div class="container text-center py-5 my-5">
            <h1 class="display-1 fw-bold text-white">404</h1>
            <p class="lead text-secondary">Blog article not found.</p>
            <a href="blogs" class="btn btn-brand mt-3">Back to Blogs</a>
          </div>';
    include 'footer.php';
    exit;
}

// 3. Read and parse the Markdown file
$content = file_get_contents($file_path);
$parts = explode('---', $content, 3);

$frontmatter = isset($parts[1]) ? $parts[1] : '';
$raw_body = isset($parts[2]) ? $parts[2] : $content;

// Parse metadata
$title = preg_match('/title:\s*"([^"]+)"/', $frontmatter, $matches) ? $matches[1] : 'Untitled';
$category = preg_match('/category:\s*"([^"]+)"/', $frontmatter, $matches) ? ucfirst(trim($matches[1])) : 'General';
$date = preg_match('/date:\s*"([^"]+)"/', $frontmatter, $matches) ? $matches[1] : date('Y-m-d');
$author = preg_match('/author:\s*"([^"]+)"/', $frontmatter, $matches) ? $matches[1] : 'Automatixes';
$image = preg_match('/image:\s*"([^"]+)"/', $frontmatter, $matches) ? trim($matches[1]) : '/assets/img/services/ai_agents.jpg';

// Ensure absolute root path for web assets (e.g. "/images/blog/...")
if (strpos($image, 'http') !== 0 && strpos($image, '/') !== 0) {
    $image = '/' . $image;
}

// Extract HTML body if it's a full HTML document
if (preg_match('/<body[^>]*>(.*?)<\/body>/is', $raw_body, $body_match)) {
    $html_body = $body_match[1];
} else {
    // If n8n just sent raw text without body tags, use it directly
    $html_body = $raw_body;
}

// Format description for search engines
$desc_match = preg_match('/description:\s*"([^"]+)"/', $frontmatter, $matches) ? trim($matches[1]) : '';
if (!empty($desc_match) && strpos($desc_match, 'SEO blog post on') === false) {
    $description = $desc_match;
} else {
    $clean_body = strip_tags($html_body);
    $clean_body = preg_replace('/\s+/', ' ', $clean_body);
    $description = substr($clean_body, 0, 155) . '...';
}

// Canonical URL matching whichever parameter was requested (slug or id)
$canonical_slug = !empty($_GET['slug']) ? 'blog-detail?slug=' . $id : 'blog-detail?id=' . $id;

// Dynamically override header metadata for this specific blog
$custom_meta = [
    'title' => $title . ' | Automatixes',
    'desc' => $description,
    'keywords' => $category . ', Automatixes Blog, AI Automation, AI Agents, Enterprise Automation',
    'url' => $canonical_slug,
    'image' => $image
];

include 'header.php'; 
?>

<!-- Schema.org Article / BlogPosting Structured Data for Google Indexing -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": <?php echo json_encode($title); ?>,
  "description": <?php echo json_encode($description); ?>,
  "image": <?php echo json_encode(strpos($image, 'http') === 0 ? $image : 'https://automatixes.com' . $image); ?>,
  "datePublished": <?php echo json_encode(date('c', strtotime($date))); ?>,
  "dateModified": <?php echo json_encode(date('c', strtotime($date))); ?>,
  "author": {
    "@type": "Organization",
    "name": <?php echo json_encode($author); ?>,
    "url": "https://automatixes.com"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Automatixes",
    "logo": {
      "@type": "ImageObject",
      "url": "https://automatixes.com/favicon.png"
    }
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": <?php echo json_encode('https://automatixes.com/' . $canonical_slug); ?>
  }
}
</script>

<!-- Blog Header -->
<section class="subpage-hero position-relative pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <span class="badge bg-surface-1 border border-secondary text-accent-brand rounded-pill px-3 py-2 fw-semibold mb-3">
                    <?php echo htmlspecialchars($category); ?>
                </span>
                <h1 class="display-5 fw-extrabold text-white mb-4"><?php echo htmlspecialchars($title); ?></h1>
                <div class="d-flex align-items-center justify-content-center text-white-50 mb-5">
                    <div class="d-flex align-items-center me-4">
                        <img src="assets/img/logo/automatixes-logo-new.png" alt="<?php echo htmlspecialchars($author); ?>" class="me-2" style="width: 28px; height: 28px; object-fit: contain;">
                        <span class="fw-semibold text-white"><?php echo htmlspecialchars($author); ?></span>
                    </div>
                    <div>
                        <i class="fa-regular fa-calendar me-1 text-accent-brand"></i> <?php echo date('F j, Y', strtotime($date)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Content -->
<section class="pb-5 bg-surface text-white">
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <!-- Featured Image -->
                <img src="<?php echo htmlspecialchars($image); ?>" class="img-fluid rounded-4 shadow mb-5 w-100 object-fit-cover border border-secondary border-opacity-25" alt="<?php echo htmlspecialchars($title); ?>" style="max-height: 500px;" onerror="this.src='/assets/img/services/ai_agents.jpg'">
                
                <!-- Article Body -->
                <div class="article-body text-white-50" style="font-size: 1.15rem; line-height: 1.9;">
                    <?php 
                    // Output the extracted HTML safely (assuming n8n generates safe HTML)
                    // We remove h1 since we already rendered the title above
                    $html_body = preg_replace('/<h1[^>]*>.*?<\/h1>/is', '', $html_body);
                    echo $html_body; 
                    ?>

                    <!-- Share & Tags -->
                    <div class="d-flex justify-content-between align-items-center border-top border-secondary border-opacity-25 pt-4 mt-5">
                        <div class="tags">
                            <span class="badge bg-surface-1 text-accent-brand border border-secondary border-opacity-25 me-2">#<?php echo htmlspecialchars($category); ?></span>
                            <span class="badge bg-surface-1 text-accent-brand border border-secondary border-opacity-25 me-2">#Automation</span>
                        </div>
                        <div class="share d-flex align-items-center">
                            <span class="fw-semibold me-3 text-white">Share:</span>
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle me-2" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle me-2" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-circle" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-surface-1 text-white border-top border-secondary border-opacity-25">
    <div class="container py-4 text-center">
        <h2 class="fw-bold text-white mb-3">Ready to deploy your own AI Agent?</h2>
        <p class="mb-4 text-white-50 max-width-600 mx-auto">Book a free consultation and let's discuss how custom AI automation can save you time and scale your operations.</p>
        <a href="contact" class="btn btn-brand rounded-pill px-4 py-2 fw-semibold">Book a Call <i class="fa-solid fa-arrow-right ms-2"></i></a>
    </div>
</section>

<!-- Article Styling Overrides -->
<style>
    .article-body h2, .article-body h3, .article-body h4 {
        color: #ffffff !important;
        font-weight: 700;
        margin-top: 2.2rem;
        margin-bottom: 1rem;
    }
    .article-body p {
        color: rgba(255, 255, 255, 0.75) !important;
        margin-bottom: 1.5rem;
    }
    .article-body strong {
        color: #ffffff !important;
    }
    .article-body ul, .article-body ol {
        color: rgba(255, 255, 255, 0.75) !important;
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }
    .article-body li {
        margin-bottom: 0.5rem;
    }
    .article-body a {
        color: var(--accent-neon) !important;
        text-decoration: underline;
    }
</style>

<?php include 'footer.php'; ?>


