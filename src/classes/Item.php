<?php 
class Item {
    private int $id;

    public function __construct(
        private string $nome,
        private string $imagem
    ){}

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getImagem(): string {
        return $this->imagem;
    }

    public function save(): bool {
        $conexao = new MySQL();

        $sql = "INSERT INTO items (nome, imagem) VALUES
            ('{$this->nome}', '{$this->imagem}')";

        return $conexao->executa($sql);
    }

    public static function get_votos(): array {
        $conexao = new MySQL();

        $sql = "SELECT nome, IFNULL(SUM(stars) / COUNT(*), 0) AS nota, COUNT(votos.stars) AS votos
            FROM votos
            RIGHT JOIN items ON items.id = votos.id_item
            GROUP BY items.id";

        return $conexao->consulta($sql);
    }
}
?>