pipeline {
    agent any

    environment {
        APACHE_ROOT = '/var/www/html'
        DOCS_DIR = '/var/www/html/doc'
    }

    stages {
        stage('Limpieza y Preparacion') {
            steps {
                script {
                    sh "docker exec -u root servidor-tarea rm -f ${APACHE_ROOT}/index.html"
                }
            }
        }

        stage('Deploy to Apache') {
            steps {
                script {
                    // Copia todo desde la raiz del workspace al contenedor
                    sh "docker exec -u root servidor-tarea sh -c 'cp -r /var/jenkins_home/workspace/${JOB_NAME}/* ${APACHE_ROOT}/'"
                    sh "docker exec -u root servidor-tarea chmod -R 777 ${APACHE_ROOT}"
                }
            }
        }

        stage('Generate Documentation') {
            steps {
                script {
                    sh "docker exec -u root servidor-tarea mkdir -p ${DOCS_DIR}"
                    sh "docker exec -u root servidor-tarea phpdoc -d ${APACHE_ROOT} -t ${DOCS_DIR} --ignore=doc/"
                }
            }
        }
    }

    post {
        success {
            echo 'Despliegue finalizado con éxito.'
        }
        failure {
            echo 'Error en el proceso de despliegue.'
        }
    }
}