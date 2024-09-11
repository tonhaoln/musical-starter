import { writeFile, readFileSync } from 'fs';

export default function themeJson(cb) {
    const theme = JSON.parse(readFileSync('./theme.json'));
    const { colors } = JSON.parse(readFileSync('./t-ehd.json'));
    const { layout } = JSON.parse(readFileSync('./t-ehd.json'));

    theme.settings.color.palette = [];

    // Push the mapped colors in to the theme.json file
    for (const color of colors) {
        if (color.inWP === true) {
            theme.settings.color.palette.push({
                name: color.name,
                slug: color.slug,
                color: color.color,
            });
        }
    }

    theme.settings.layout.contentSize = layout.contentSize;
    theme.settings.layout.wideSize = layout.wideSize;

    writeFile(
        './theme.json', // File to write to
        JSON.stringify(theme, null, 4), // Contents of file
        {}, // Options for the file
        (err) => { // Callback
            if (err) {
                throw err;
            }
        },
    );

    cb();
}
