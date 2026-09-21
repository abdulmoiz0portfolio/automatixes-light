<?php 
$page_key = 'blogs'; 
include 'header.php'; 

// Helper function to parse n8n Markdown files
function get_blogs() {
    $blogs = [];
    $files = glob(__DIR__ . '/content/articles/*.md');
    if ($files) {
        foreach ($files as $file) {
            $content = file_get_contents($file);
            // Parse frontmatter
            $title = preg_match('/title:\s*"([^"]+)"/', $content, $matches) ? $matches[1] : 'Untitled';
            $description = preg_match('/description:\s*"([^"]+)"/', $content, $matches) ? $matches[1] : '';
            $category = preg_match('/category:\s*"([^"]+)"/', $content, $matches) ? ucfirst(trim($matches[1])) : 'General';
            $date = preg_match('/date:\s*"([^"]+)"/', $content, $matches) ? $matches[1] : date('Y-m-d');
            $image = preg_match('/image:\s*"([^"]+)"/', $content, $matches) ? trim($matches[1]) : '/assets/img/services/ai_automations.jpg';
            
            // Ensure absolute root path for web assets (e.g. "/images/blog/...")
            if (strpos($image, 'http') !== 0 && strpos($image, '/') !== 0) {
                $image = '/' . $image;
            }
            
            $blogs[] = [
                'id' => basename($file, '.md'),
                'title' => $title,
                'description' => $description,
                'category' => $category,
                'date' => $date,
                'image' => $image,
                'file_time' => strtotime($date)
            ];
        }
        // Sort by date descending
        usort($blogs, function($a, $b) {
            return $b['file_time'] - $a['file_time'];
        });
    }
    return $blogs;
}

$all_blogs = get_blogs();
?>

<!-- Subpage Hero Section -->
<section class="subpage-hero text-center position-relative py-5">
    <div class="container pt-4">
        <span class="badge bg-surface-1 border border-secondary text-accent-brand rounded-pill px-3 py-2 fw-semibold mb-3">
            <i class="fa-solid fa-book-open me-1"></i> Our Resources
        </span>
        <h1 class="display-4 fw-extrabold text-white mb-3">Insights & Updates</h1>
        <p class="lead text-white-50 max-width-600 mx-auto">
            Read our latest insights on AI automation, web development, and digital marketing strategies for growing your business.
        </p>
    </div>
</section>

<!-- Blog Listing Section -->
<section class="py-5 bg-surface">
    <div class="container py-4">
        
        <?php if (empty($all_blogs)): ?>
            <div class="text-center py-5 my-5">
                <i class="fa-solid fa-folder-open text-muted fs-1 mb-3"></i>
                <h3 class="fw-bold text-white">No Articles Found</h3>
                <p class="text-white-50">Articles published via n8n will appear here automatically.</p>
            </div>
        <?php else: ?>
            <div class="row g-4">
                <?php foreach ($all_blogs as $blog): ?>
                <!-- Blog Card -->
                <div class="col-lg-4 col-md-6">
                    <div class="card border border-secondary border-opacity-25 shadow-sm h-100 rounded-4 overflow-hidden blog-card bg-surface-1 text-white">
                        <div class="position-relative">
                            <img src="<?php echo htmlspecialchars($blog['image']); ?>" class="card-img-top object-fit-cover" alt="<?php echo htmlspecialchars($blog['title']); ?>" style="height: 220px;" onerror="this.src='/assets/img/services/ai_automations.jpg'">
                            <span class="badge bg-brand text-dark position-absolute top-0 end-0 m-3 rounded-pill px-3 py-2 fw-bold">
                                <?php echo htmlspecialchars($blog['category']); ?>
                            </span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="text-white-50 small mb-2">
                                <i class="fa-regular fa-calendar me-1 text-accent-brand"></i> 
                                <?php echo date('F j, Y', $blog['file_time']); ?>
                            </div>
                            <h5 class="card-title fw-bold text-white mb-3">
                                <?php echo htmlspecialchars($blog['title']); ?>
                            </h5>
                            <p class="card-text text-white-50 mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;">
                                <?php echo htmlspecialchars($blog['description']); ?>
                            </p>
                            <a href="blog-detail?id=<?php echo urlencode($blog['id']); ?>" class="btn btn-outline-brand rounded-pill align-self-start fw-bold px-4 py-2">
                                Read More <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
    </div>
</section>

<!-- Custom Styles for Blog Cards -->
<style>
    .blog-card {
        background: var(--bg-surface-1, #141414) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s ease, border-color 0.3s ease;
    }
    .blog-card:hover {
        transform: translateY(-8px);
        border-color: rgba(200, 224, 25, 0.4) !important;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5) !important;
    }
</style>

<?php include 'footer.php'; ?>


