pipeline {
    agent any

    environment {
        APACHE_ROOT = '/var/www/html'
        DOCS_DIR = '/var/www/html/doc'
    }

    stages {
        stage('Deploy to Apache') {
            steps {
                script {
                    // Copia los archivos del repositorio a la carpeta de Apache
                    sh "cp -r * ${APACHE_ROOT}"
                }
            }
        }

        stage('Generate Documentation') {
            steps {
                script {
                    // Crea la carpeta de documentación si no existe
                    sh "mkdir -p ${DOCS_DIR}"
                    // Genera la documentación con phpDocumentor
                    sh "phpdoc -d ${APACHE_ROOT} -t ${DOCS_DIR}"
                }
            }
        }
    }

    post {
        success {
            echo 'Deployment and documentation generation successful.'
        }
        failure {
            echo 'Deployment or documentation generation failed.'
        }
    }
}

