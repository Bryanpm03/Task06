pipeline {
    agent any

    environment {
        APACHE_ROOT = '/var/www/html'
        DOCS_DIR = '/var/www/html/doc'
    }

    stages {
        stage('Deploy') {
            steps {
                script {
                    sh "cp -r * ${APACHE_ROOT}"
                    sh "chmod -R 777 ${APACHE_ROOT}"
                }
            }
        }

        stage('Docs') {
            steps {
                script {
                    sh "mkdir -p ${DOCS_DIR}"
                    sh "phpdoc -d ${APACHE_ROOT} -t ${DOCS_DIR} --ignore=doc/"
                }
            }
        }
    }

    post {
        success {
            echo 'Deployment successful'
        }
        failure {
            echo 'Deployment failed'
        }
    }
}