<!DOCTYPE html>
<html lang="de">
<head>
    <?php include __DIR__ . '/head_common.php'; ?>

    <title><?php echo htmlspecialchars($page_title); ?> – Lerndex</title>
    <meta name="robots" content="noindex">

    <style>
        .legal-page { padding: 8rem 0 4rem; min-height: 80vh; }
        .legal-content { max-width: 800px; margin: 0 auto; background: var(--white); padding: 3rem; border-radius: var(--radius); box-shadow: var(--shadow); }
        .legal-content h1 { color: var(--primary); margin-bottom: 0.5rem; font-size: 2.5rem; }
        .legal-content .subtitle { color: var(--text-gray); margin-bottom: 2.5rem; font-size: 1rem; }
        .legal-content h2 { font-size: 1.4rem; margin-top: 2.5rem; margin-bottom: 0.75rem; color: var(--primary); padding-bottom: 0.5rem; border-bottom: 2px solid var(--bg-light); }
        .legal-content h3 { font-size: 1.05rem; margin-top: 1.5rem; margin-bottom: 0.5rem; color: var(--text-dark); }
        .legal-content p, .legal-content li { margin-bottom: 1rem; color: var(--text-gray); line-height: 1.8; }
        .legal-content ul, .legal-content ol { padding-left: 1.5rem; margin-bottom: 1.2rem; }
        .legal-content ul { list-style: disc; }
        .legal-content ol { list-style: decimal; }
        .legal-content strong { color: var(--text-dark); }
        .legal-content a { color: var(--primary); text-decoration: underline; }

        .info-box { background: var(--bg-light); border-left: 4px solid var(--secondary); border-radius: 0 12px 12px 0; padding: 1.25rem 1.5rem; margin: 1.5rem 0; }
        .info-box p { margin-bottom: 0; color: var(--text-dark); }

        .highlight-box { background: linear-gradient(135deg, rgba(74,29,150,0.05), rgba(124,58,237,0.08)); border: 1px solid rgba(124,58,237,0.2); border-radius: var(--radius); padding: 1.5rem; margin: 1.5rem 0; }
        .highlight-box .box-title { display: flex; align-items: center; gap: 0.5rem; font-weight: 700; color: var(--primary); margin-bottom: 0.75rem; font-size: 1rem; }
        .highlight-box p { margin-bottom: 0.5rem; }

        .children-box { background: linear-gradient(135deg, rgba(16,185,129,0.05), rgba(16,185,129,0.1)); border: 1px solid rgba(16,185,129,0.3); border-radius: var(--radius); padding: 1.5rem; margin: 1.5rem 0; }
        .children-box .box-title { display: flex; align-items: center; gap: 0.5rem; font-weight: 700; color: var(--primary); margin-bottom: 0.75rem; font-size: 1rem; }
        .children-box p { margin-bottom: 0.5rem; }

        .price-table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; border-radius: 12px; overflow: hidden; box-shadow: var(--shadow); }
        .price-table th { background: var(--primary); color: white; padding: 1rem 1.25rem; text-align: left; font-weight: 600; }
        .price-table td { padding: 0.9rem 1.25rem; border-bottom: 1px solid var(--bg-light); color: var(--text-gray); }
        .price-table tr:last-child td { border-bottom: none; }
        .price-table tr:nth-child(even) td { background: rgba(245, 243, 255, 0.5); }

        .placeholder { background: rgba(245, 158, 11, 0.1); border: 1px dashed var(--warning); border-radius: 8px; padding: 0.2rem 0.6rem; color: var(--warning); font-weight: 600; font-size: 0.9em; }

        .back-link { display: inline-flex; align-items: center; gap: 0.5rem; color: var(--primary); font-weight: 600; margin-bottom: 2rem; transition: transform 0.3s ease; }
        .back-link:hover { transform: translateX(-5px); }

        .toc { background: var(--bg-light); border-radius: var(--radius); padding: 1.5rem 2rem; margin-bottom: 2.5rem; }
        .toc h3 { color: var(--primary); margin-bottom: 1rem; font-size: 1rem; text-transform: uppercase; letter-spacing: 0.05em; }
        .toc ol { padding-left: 1.25rem; margin: 0; list-style: decimal; }
        .toc li { margin-bottom: 0.4rem; }
        .toc a { color: var(--secondary); text-decoration: none; font-size: 0.95rem; }
        .toc a:hover { text-decoration: underline; }
    </style>

<link rel="icon" type="image/png" href="assets/images/logo/lerndex_logo.png">

</head>