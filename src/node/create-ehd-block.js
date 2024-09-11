const fs = require("fs");
const prompts = require('prompts');
const path = require("path");

const ROOT_DIR = '.'; // Root directory
const BLOCKS_DIR = path.join(ROOT_DIR, 'blocks'); // Blocks directory

const QUESTIONS = [{
        type: 'text',
        name: 'namespace',
        message: 'Block Namespace',
        initial: 'ehd'
    },
    {
        type: 'text',
        name: 'title',
        message: 'Block Name'
    },
    {
        type: 'text',
        name: 'description',
        message: 'Block description',
        initial: ''
    },
    {
        type: 'text',
        name: 'icon',
        message: 'Dashicon',
        initial: 'star-filled'
    }
];


    console.clear();
    console.log('Create EHD Block JSON is running...');
    console.log('');
    console.log('This will create a new folder in the current directory containing scaffolding for a new WordPress block using Advanced Custom Fields.');
    console.log('');

    let cancelled = false;

    // Listen for SIGINT signals and set the "cancelled" flag to true.
    process.on('SIGINT', () => {
        console.log('Cancelled.');
        cancelled = true;
    });

    // Helper function for creating files.
    const createFile = async (path, content, successMessage, errorMessage) => {
        try {
            fs.writeFileSync(path, content);
            console.log(successMessage);
        } catch (error) {
            console.error(errorMessage, error);
        }
    };

    (async () => {
				const response = await prompts(QUESTIONS, {onCancel: () => {cancelled = true}});

				// Check if the user cancelled the prompts.
				if (cancelled) {
					console.log('Aborting...');
					return;
				}

        const title = response.title;
        let slug = response.title.replace(/\s+/g, '-').toLowerCase();
        let underslug = response.title.replace(/\s+/g, '_').toLowerCase();
        const namespace = response.namespace.replace(/\s+/g, '-').toLowerCase();
        const qualifiedName = namespace + '/' + slug;
        const folder = '/' + slug;
        const absolute = BLOCKS_DIR + folder;

        // Create default CSS class.
        const css = '.wp-block-' + namespace + '-' + slug + ' {}';

        // Create Folder.
        if (!fs.existsSync(absolute)) {
            fs.mkdirSync(absolute);
        } else {
            console.log('Error: A directory called ' + slug + ' was already found. Aborting.')
            return;
        }

        // Handle cancellation.
        if (cancelled) {
            console.log('Aborting.');
            return;
        }

        // Create files.
        await createFile(
            absolute + '/' + slug + '.scss',
            `//@import "../../src/scss/variables"; // ${css}`,
            `${slug}.scss created`,
            'Error creating SCSS file:'
        );
        await createFile(
            absolute + '/editor.scss',
            `// ${css}`,
            `editor.scss created`,
            'Error creating editor SCSS file:'
        );

        // Handle cancellation.
        if (cancelled) {
            console.log('Aborting.');
            return;
        }

        // Get the PHP template and turn in to PHP.
        let phpTemplate = '/template-php.txt';
        try {
            let data = fs.readFileSync(__dirname + phpTemplate, 'utf8');
            data = data.replace(/XYZ/g, title)
						.replace(/QWY/g, slug)
						.replace(/DX9S/g, namespace)
            .replace(/UDS/g, underslug)
						.replace(/\r\n/g, '\n');
				await createFile(
						absolute + '/' + slug + '.php',
						data,
						`${slug}.php created`,
						'Error creating PHP template:'
				);
        } catch (error) {
				  console.error('Error creating PHP template:', error);
		    }

        let initTemplate = '/template-init.txt';
        try {
            let dataInit = fs.readFileSync(__dirname + initTemplate, 'utf8');
            dataInit = dataInit.replace(/XYZ/g, title)
						.replace(/QWY/g, slug)
						.replace(/DX9S/g, namespace)
            .replace(/UDS/g, underslug)
						.replace(/\r\n/g, '\n');
				  await createFile(
						absolute + '/init.php',
						dataInit,
						`init.php created`,
						'Error creating PHP template:'
				  );
        } catch (error) {
				  console.error('Error creating Init template:', error);
		    }

        let jsTemplate = '/template-js.txt';
        try {
            let dataJS = fs.readFileSync(__dirname + jsTemplate, 'utf8');
            dataJS = dataJS.replace(/XYZ/g, title)
						.replace(/QWY/g, slug)
						.replace(/DX9S/g, namespace)
            .replace(/UDS/g, underslug)
						.replace(/\r\n/g, '\n');
				  await createFile(
						absolute + '/'+slug+'.js',
						dataJS,
						`${slug}.js created`,
						'Error creating JS template:'
				  );
        } catch (error) {
				  console.error('Error creating JS template:', error);
		    }
		

		// Handle cancellation.
		if (cancelled) {
				console.log('Aborting.');
				return;
		}

		// Get the Block.json template.
		let jsonTemplate = '/template-block.json';
		try {
				let raw = fs.readFileSync(__dirname + jsonTemplate);
				let template = JSON.parse(raw);
				// Update Block.json values.
				template.name = qualifiedName;
				template.title = title;
				template.description = response.description;
				template.icon = response.icon;
				template.style = 'file:../../dist/css/' + slug +'/'+ slug + '.css';
				template.editorStyle = 'file:../../dist/css/' + slug +'/editor.css';
        template.script = 'ehd-'+slug+'-js';
				template.acf.renderTemplate = slug + '.php';
				let jsonContent = JSON.stringify(template, null, "\t");
				await createFile(
						absolute + '/block.json',
						jsonContent,
						'block.json created',
						'Error creating JSON template:'
				);
		} catch (error) {
				console.error('Error creating JSON template:', error);
		}

})();