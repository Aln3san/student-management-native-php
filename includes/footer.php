</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js" integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Clean the URL from status parameters after the page loads
    if (window.history.replaceState) {
        const url = new URL(window.location);
        url.searchParams.delete('status');
        window.history.replaceState({
            path: url.href
        }, '', url.href);
    }
</script>
</body>

</html>