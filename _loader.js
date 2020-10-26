/**
 * Pulls in all scripts
 */
function requireAll(requireContext) {
    return requireContext.keys().map(requireContext);
}
requireAll(require.context(".", true, /\.\/(?!(dist)).*\/([^/]+\/)*.+\.js$/));