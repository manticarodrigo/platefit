const requireAll = (r) => r.keys().forEach(r);

requireAll(require.context('../src/assets/svgs/', true, /\.svg$/));
